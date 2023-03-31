<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Facades\Localization locale()
 * @see \App\Facades\Localization
 */
class Localization extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "LocalizationService";
    }
}
