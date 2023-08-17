<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\MenuService getMenuId()
 * @method static \App\Services\MenuService getMenuType()
 * @see \App\Services\MenuService
 */
class MenuService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "MenuService";
    }
}
