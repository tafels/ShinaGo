<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\LocalizationService locale()
 * @see \App\Services\LocalizationService
 */
class LocalizationService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "LocalizationService";
    }
}
