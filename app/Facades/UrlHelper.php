<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\UrlService;

/**
 * @method static \App\Facades\UrlHelper segmentUrl($segments = [])
 * @method static \App\Facades\UrlHelper searchSlugSegments(object $class, int $parent_id, string $segment)
 * @see \App\Facades\UrlHelper
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
        return UrlService::class;
    }
}
