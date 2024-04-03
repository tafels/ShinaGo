<?php

namespace App\Services;

use App\Models\CategoryContent;
use App\Models\Characteristic;
use App\Models\CharacteristicValueLanguage;
use Illuminate\Support\Facades\Cache;

class FilterService extends BaseService
{
    /**
     * @return mixed
     */
    public function getFilterSection($isMainFilter = false, $typeFilter = null)
    {
        if (!$this->isActiveCache()) {
            return $this->getSectionByCharacteristic($isMainFilter, $typeFilter);
        }

        $cacheKey = 'filterItem-' . $isMainFilter . '-' . request()->getLocale();

        return Cache::remember($cacheKey, now()->addMinute(5), function () use ($isMainFilter, $typeFilter) {
            return $this->getSectionByCharacteristic($isMainFilter, $typeFilter);
        });
    }

    /**
     * @return mixed
     */
    public function getFilterSectionItem($isMainFilter = false, $typeFilter = null)
    {
        if (!$this->isActiveCache()) {
            return $this->getSectionItemByCharacteristic($isMainFilter, $typeFilter);
        }

        $cacheKey = 'filterValue-' . $isMainFilter . '-' . request()->getLocale();

        return Cache::remember($cacheKey, now()->addMinute(5), function () use ($isMainFilter, $typeFilter) {
            return $this->getSectionItemByCharacteristic($isMainFilter, $typeFilter);
        });
    }

    /**
     * @return mixed
     */
    public function getSectionByCharacteristic($isMainFilter)
    {
        $builder = Characteristic::where('published', true)->get();

        if ($isMainFilter) {
            $builder = $builder->where('is_main', true)->sortBy('ordering_main');
        } else {
            $builder = $builder->sortBy('ordering');
        }

        $collection = $builder->map(function ($item, $key) {
            /** @var Characteristic $item */
            return [
                'title' => trans('filter.type_' . $item->getShortName()),
                'slug' => $item->getSlug(),
                'shortName' => $item->getShortName(),
                'typeInput' => ($item->getMultiple()) ? 'checkbox' : 'radio',
                'groupId' => $item->getGroupId(),
            ];
        });

        $collection = $collection->mapToGroups(function ($item) {
            return [$item['groupId'] => $item];
        });

        $collection = $collection->map(function ($item) {
            return $item->keyBy('shortName');
        });

        return $collection;
    }

    public function getSectionItemByCharacteristic($isMainFilter, $typeFilter)
    {
        $builder = Characteristic::where('published', true)
            ->with(['getCharacteristicValues' => function ($q) {
                $q->where('published', true)
                    ->with(['getCharacteristicValueByLocale']);
            }
            ])->get();

        if ($isMainFilter) {
            $builder = $builder->where('is_main', true);
        }
        if ($typeFilter) {
            $builder = $builder->where('short_name', $typeFilter);
        }

        $characteristicByGroup = $builder->groupBy('short_name');

        $itemByGroups = $characteristicByGroup->map(function ($item) {
            $characteristicValues = $item->first()->getCharacteristicValues;

            $merged = collect([]);

            foreach ($characteristicValues as $itemValue) {
                $characteristic = $itemValue->getCharacteristicValueByLocale;
                if ($itemValue->getPopular()) {
                    $merged = $merged->mergeRecursive(['popular' => [$characteristic]]);
                }
                $merged = $merged->mergeRecursive(['value' => [$characteristic]]);
            }

            return collect($merged);
        });

        return $itemByGroups;
    }

    public function initCategoryFilter()
    {

        $segments = $this->getSegmentUrl();
        $category = $this->searchCategory($segments);
        $groupId = $category->category_id;

        $parameters = $this->getParameterUrl($groupId);

        $segments = collect(request()->query)->flatMap(function ($value, $key) {
            return explode(',', $value);
        })->merge($segments);


        $result = CharacteristicValueLanguage::whereIn('slug', $segments)
            ->where(function (Builder $qcl) {
                $qcl->where('language', '*')
                    ->orWhere('language', request()->getLocale());
            })
            ->with(['getCharacteristicGroup' => function ($qg) use ($groupId) {
                $qg->with(['getCharacteristic' => function ($qc) use ($groupId) {
                    $qc->where('published', true)
                        ->where('group_id', $groupId);
                }]);
            }])
            ->get();

        $paramsUrl = collect([]);
        $paramsFilter = collect([]);

        foreach ($result as $item) {
            $characteristic = $item->getCharacteristicGroup->getCharacteristic;

            if (!$characteristic) {
                continue;
            }

            if (!isset($paramsUrl[$characteristic->slug])) {
                $paramsUrl->put($characteristic->slug, [
                    'multiple' => $characteristic->multiple,
                    'ordering' => $characteristic->ordering_slug,
                    'slug' => collect([]),
                ]);
            }

            $paramsUrl[$characteristic->slug]['slug']->push($item->slug);
            $paramsFilter->push($item->getCharacteristicGroup->id);
        }

        $paramsUrl = $paramsUrl->sortBy('ordering');

        $arrSlugs = [
            'path' => [],
            'query' => []
        ];

        foreach ($paramsUrl as $key => $item) {
            if ($item['multiple'] && count($item['slug']) > 1) {
                $arrSlugs['query'][$key] = $item['slug']->toArray();
            } else {
                $arrSlugs['path'][] = $item['slug']->first();
            }
        }

        $arrSlugs['query'] = array_merge($arrSlugs['query'], $parameters->toArray());

        $this->validDataUrl($category, $arrSlugs);

        return $paramsFilter;
    }

    public function createUrl($request)
    {
        $params = $request->get('params');
        $groupID = $params['groupFilter'];
        $valueFilter = $params['valueFilter'];

        $characteristics = $this->getSectionByCharacteristic();

        $category = CategoryContent::where('category_id', $groupID)
            ->where('language', request()->getLocale())
            ->first();

        $params = collect($valueFilter)->reject(function ($item) {
            return empty($item);
        });

        $arrSlugs = [
            'path' => [],
            'query' => []
        ];

        foreach ($characteristics as $characteristic) {
            $shortName = $characteristic->get('short_name');

            if (!$params->has($shortName)) {
                continue;
            }

            $groupNameValue = $params->get($shortName);

            if (!$characteristic->get('multiple')) {
                $arrSlugs['path'][] = $groupNameValue;
            } else {
                if (count($groupNameValue) > 1) {
                    $arrSlugs['query'][$characteristic->get('slug')] = $groupNameValue;
                } else {
                    $arrSlugs['path'][] = current($groupNameValue);
                }
            }
        }

        return $this->getRouteUrl($category->slug, $arrSlugs['path'], $arrSlugs['query']);
    }

    private function getRouteUrl($category, $any = [], $query = null, $absolute = true)
    {
        if (!empty($any)) {
            return UrlHelperService::routeUrl('initCategoryAny', ['category' => $category, 'any' => $any], $query, $absolute);
        } else {
            return UrlHelperService::routeUrl('initCategory', ['category' => $category], $query, $absolute);
        }
    }

    private function searchCategory($segments)
    {
        $category = CategoryContent::where('slug', array_shift($segments))
            ->where('language', request()->getLocale())
            ->first();

        if (is_null($category)) {
            abort(404);
        }

        return $category;
    }

//
    private function getSegmentUrl()
    {
        return UrlHelperService::excludeSegmentLocale(request()->segments());
    }

//
    private function getParameterUrl($groupId)
    {
        $parameters = Characteristic::whereIn('slug', request()->query->keys())
            ->where('published', true)
            ->where('group_id', $groupId)
            ->doesntHave('getCharacteristicGroup')
            ->get()
            ->sortBy('ordering_slug');

        $parameters->map(function ($item, $key) use ($parameters) {
            if (request()->query->get($item->slug)) {
                $value = request()->query->get($item->slug);
                $paramsCharacteristic = json_decode($item->params);
                if (isset($paramsCharacteristic->explode)) {
                    $value = explode($paramsCharacteristic->explode, $value);
                    sort($value);
                }
                $parameters->put($item->slug, $value);
            }
            $parameters->forget($key);
        });

        if (request()->query->get('sort')) {
            $sort = request()->query->get('sort');
            if (in_array($sort, CategoryService::SORT)) {
                $parameters->put('sort', $sort);
            }
        }
        if (request()->query->get('page')) {
            if (request()->query->get('page') > 1) {
                $parameters->put('page', request()->query->get('page'));
            }
        }

        return $parameters;
    }

    private function validDataUrl($category, $arrSlugs)
    {
        $realUrl = $this->getRouteUrl($category->slug, $arrSlugs['path'], $arrSlugs['query'], false);

        $ignoreUrl = collect(request()->query);
        $ignoreUrl->map(function ($value, $key) use ($ignoreUrl) {
            if (in_array($key, config("app.ignoreQueryUrl"))) {
                return $key . '' . $value;
            } else {
                $ignoreUrl->forget($key);
            }
        });

        $arrSlugs['query'] = array_merge($arrSlugs['query'], $ignoreUrl->toArray());

        $validUrl = $this->getRouteUrl($category->slug, $arrSlugs['path'], $arrSlugs['query'], false);

        if (request()->getRequestUri() !== $validUrl) {
            header("Location: " . $realUrl);
            exit;
        }
    }
}
