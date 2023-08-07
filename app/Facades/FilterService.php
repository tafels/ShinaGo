<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\FilterService getFilterItem()
 * @method static \App\Services\FilterService getFilterValue()
 * @method static \App\Services\FilterService getFilterGroupValue()
 * @method static \App\Services\FilterService setTypeFilter(string $type)
 * @method static \App\Services\FilterService setIsMain(boolean $is_main)
 * @method static \App\Services\FilterService setGroupId(int $group_id)
 * @method static \App\Services\FilterService createUrl(string $data)
 * @method static \App\Services\FilterService getData()
 * @method static \App\Services\FilterService initCategoryFilter()
 * @see \App\Services\FilterService
 */
class FilterService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'FilterService';
    }

}
