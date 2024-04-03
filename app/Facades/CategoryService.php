<?php

namespace App\Facades;

use App\Models\Category;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\CategoryService getFullUrlCategory(Category $category)
 * @see \App\Services\CategoryService
 */
class CategoryService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CategoryService';
    }
}
