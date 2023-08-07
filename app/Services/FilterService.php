<?php

namespace App\Services;

use App\Models\CategoryContent;
use App\Models\Characteristic;
use App\Models\CharacteristicValueLanguage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class FilterService extends BaseService
{
    private $is_main;
    private $group_id;
    private $data;
    public $type_filter;

    /**
     * @return bool
     */
    public function getIsMain(): bool
    {
        return $this->is_main;
    }

    /**
     * @param bool $is_main
     * @return void
     */
    public function setIsMain(bool $is_main = false)
    {
        $this->is_main = $is_main;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @param $type
     * @return void
     */
    public function setTypeFilter($type)
    {
        $this->type_filter = $type;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
    //        Redis::set('name1', $this->getFilterType());
    //        return Redis::get('name1');

    private function getRouteUrl($category, $any = [], $query = null, $absolute = true)
    {
        if (!empty($any)) {
            return UrlHelperService::routeUrl('initCategoryAny', ['category' => $category, 'any' => $any], $query, $absolute);
        } else {
            return UrlHelperService::routeUrl('initCategory', ['category' => $category], $query, $absolute);
        }
    }

    public function getFilterItem()
    {
        $cacheKey = 'filterItem-' . $this->getIsMain() . '-' . request()->getLocale();

        return Cache::remember($cacheKey, now()->addMinute(5), function () {
            return $this->getFilterType();
        });
    }

    public function getFilterValue()
    {
        $cacheKey = 'filterValue-' . $this->getIsMain() . '-' . request()->getLocale();

        return Cache::remember($cacheKey, now()->addMinute(5), function () {
            return $this->getValue();
        });
    }

    public function getFilterGroupValue()
    {
        return $this->getValue();
    }

    public function getFilterTypeValue()
    {
        return $this->getValue();
    }

    public function getGroupFilterType()
    {
        $filter = Characteristic::where('published', true)
            ->where('group_id', $this->getGroupId())
            ->get();

        $collection = $filter->map(function ($item, $key) {
            return collect([
                'slug' => $item->slug,
                'short_name' => $item->short_name,
                'multiple' => $item->multiple,
                'typeInput' => ($item->multiple) ? 'checkbox' : 'radio',
                'ordering' => $item->ordering_slug,
            ]);
        });
        $collection = $collection->sortBy('ordering');
        $collection->all();

        return $collection;

    }

    public function getFilterType()
    {
        $builder = Characteristic::where('published', true)->get();

        if ($this->is_main) {
            $builder = $builder->where('is_main', true)->sortBy('ordering_main');
        } else {
            $builder = $builder->sortBy('ordering');
        }

        $collection = $builder->map(function ($item, $key) {
            return [
                'title' => trans('filter.type_' . $item->short_name),
                'slug' => $item->slug,
                'short_name' => $item->short_name,
                'typeInput' => ($item->multiple) ? 'checkbox' : 'radio',
                'group_id' => $item->group_id,
            ];
        });

        $collection = $collection->mapToGroups(function ($item) {
            return [$item['group_id'] => $item];
        });

        $collection = $collection->map(function ($item) {
            return $item->keyBy('short_name');
        });

        return $collection;
    }

    /**
     * @return object
     */
    public function getValue()
    {
        $builder = Characteristic::where('published', true)
            ->with(['getCharacteristicGroup' => function ($q) {
                $q->where('published', true)
                    ->with(['getCharacteristicGroupToLanguage']);
            }
            ])->get();

        if ($this->is_main) {
            $builder = $builder->where('is_main', true);
        }
        if ($this->type_filter) {
            $builder = $builder->where('short_name', $this->type_filter);
        }

        $grouped = $builder->groupBy('short_name');

        $multiplied = $grouped->map(function ($item) {
            $group = $item->first()->getCharacteristicGroup;

            $merged = collect([]);

            foreach ($group as $itemGroup) {
                $characteristic = $itemGroup->getCharacteristicGroupToLanguage;
                if ($itemGroup->popular) {
                    $merged = $merged->mergeRecursive(['popular' => [$characteristic]]);
                }
                $merged = $merged->mergeRecursive(['value' => [$characteristic]]);
            }

            return collect($merged);
        });

        return $multiplied;
    }

    public function createUrl($request)
    {
        $this->setGroupId($request->get('params')['groupFilter']);

        $groupItem = $this->getGroupFilterType();

        $category = CategoryContent::where('category_id', $this->getGroupId())
            ->where('language', request()->getLocale())
            ->first();

        $valueFilter = $request->get('params')['valueFilter'];

        $params = collect($valueFilter)->reject(function ($item) {
            return empty($item);
        });

        $arrSlugs = [
            'path' => [],
            'query' => []
        ];

        foreach ($groupItem as $item) {
            if (!$params->has($item->get('short_name'))) {
                continue;
            }

            $key = $item->get('short_name');

            if (!$item->get('multiple')) {
                $arrSlugs['path'][] = $params->get($key);
            } else {
                if (count($params->get($key)) > 1) {
                    $arrSlugs['query'][$item->get('slug')] = $params->get($key);
                } else {
                    $arrSlugs['path'][] = current($params->get($key));
                }
            }
        }

        return $this->getRouteUrl($category->slug, $arrSlugs['path'], $arrSlugs['query']);
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

    private function getSegmentUrl()
    {
        return UrlHelperService::excludeSegmentLocale(request()->segments());
    }

    private function getParameterUrl()
    {
        $parameters = Characteristic::whereIn('slug', request()->query->keys())
            ->where('published', true)
            ->where('group_id', $this->getGroupId())
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

    /**
     * @return Collection
     */
    public function initCategoryFilter()
    {

        $segments = $this->getSegmentUrl();
        $category = $this->searchCategory($segments);
        $this->setGroupId($category->category_id);

        $parameters = $this->getParameterUrl();

        $segments = collect(request()->query)->flatMap(function ($value, $key) {
            return explode(',', $value);
        })->merge($segments);


        $result = CharacteristicValueLanguage::whereIn('slug', $segments)
            ->where(function (Builder $qcl) {
                $qcl->where('language', '*')
                    ->orWhere('language', request()->getLocale());
            })
            ->with(['getCharacteristicGroup' => function ($qg) {
                $qg->with(['getCharacteristic' => function ($qc) {
                    $qc->where('published', true)
                        ->where('group_id', $this->getGroupId());
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
