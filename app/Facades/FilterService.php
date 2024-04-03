<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Services\FilterService getFilterSection()
 * @method static \App\Services\FilterService getFilterSectionItem()
 * @method static \App\Services\FilterService getFilterGroupValue()
 * @method static \App\Services\FilterService setTypeFilter(string $type)
 * @method static \App\Services\FilterService setMainFilter(boolean $isMain)
 * @method static \App\Services\FilterService setGroupId(int $groupId)
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
