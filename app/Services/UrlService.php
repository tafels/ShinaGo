<?php

namespace App\Services;

use Illuminate\Support\Facades\App;


class UrlService extends BaseService
{
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
        $items =  $class::where('published', true)
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
