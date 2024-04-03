<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class UrlHelperService extends BaseService
{
    const ignoreQuery = [

    ];

    public function routeUrl($name, $path, $query = null, $absolute = true)
    {
        $parameters = collect($path)->map(function ($value, $key) {
            return (is_array($value)) ? implode('/', $value) : $value;
        })->all();

        $query = collect($query)->map(function ($value, $key) {
            $value = (is_array($value)) ? implode(',', $value) : $value;
            return $key . '=' . $value;
        })->all();

        $query = collect($query)->implode('&');

        array_push($parameters, $query);

        return app('url')->route($name, $parameters, $absolute);
    }

    public function excludeSegmentLocale()
    {
        $locale = request()->getLocale();
        $segmentUrl = request()->segments();

        if ($locale && in_array($locale, config("app.locales")) && $locale != request()->getDefaultLocale()) {
            if (current($segmentUrl) == $locale) {
                array_shift($segmentUrl);
                return $segmentUrl;
            }
        }

        return $segmentUrl;
    }

    public function ignoreQueryUrl($data): bool
    {
        return false;
    }


    /**
     * @return array
     */
    public function segmentUrl($segments = []): array
    {
        $segmentUrl = [];

        $segments = (!empty($segments)) ? $segments : request()->segments();

        foreach ($segments as $value) {
            if (App::currentLocale() !== $value) {
                $segmentUrl[] = $segment = (isset($segment)) ? implode('/', [$segment, $value]) : $value;
            }
        }

        return $segmentUrl;
    }

    /**
     * @param object $class
     * @param int $parent_id
     * @param string $segment
     * @return mixed
     */
    public function searchSlugSegments(object $class, int $parent_id, string $segment)
    {
        $items = $class::where('published', true)
            ->where('parent_id', '=', $parent_id)
            ->with(['getContent' => function ($q) use ($segment) {
                $q->where('language', '=', request()->getLocale());
                $q->where('slug', '=', $segment);
            }])
            ->get();

        foreach ($items as $item) {
            if (!count($item->getContent)) continue;
            return $item->id;
        }
        return false;
    }
}
