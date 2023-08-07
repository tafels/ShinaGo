<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\UrlHelperService;

/**
 * @method static \App\Services\UrlHelperService segmentUrl($segments = [])
 * @method static \App\Services\UrlHelperService excludeSegmentLocale()
 * @method static \App\Services\UrlHelperService ignoreQueryUrl(string $data)
 * @method static \App\Services\UrlHelperService searchSlugSegments(object $class, int $parent_id, string $segment)
 * @see \App\Services\UrlHelperService
 */

class UrlHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return UrlHelperService::class;
    }
}
