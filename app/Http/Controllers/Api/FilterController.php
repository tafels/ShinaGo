<?php

namespace App\Http\Controllers\Api;

use App\Facades\FilterService;
use Illuminate\Routing\Controller;
use App\Services\CharacteristicService;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    const GROUP_TIRES = 1;
    const GROUP_RIMS = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \App\Services\FilterService
     */

    public function initFilter (Request $request)
    {
        return FilterService::createUrl($request);
    }

    public function getFilterValue (Request $request)
    {
        $isMain = $request->get('isMain');
        $filterValue = app(FilterService::class);
        $filterValue::setIsMain($isMain);
        $filterValue = $filterValue::getFilterValue();

        return $filterValue->toJson();
    }

    public function getFilterGroupValue (Request $request)
    {
        $groupId = $request->get('groupId');
        $filterValue = app(FilterService::class);
        $filterValue::setGroupId($groupId);
        $filterValue = $filterValue::getFilterGroupValue();

        return $filterValue->toJson();
    }

    public function getFilterTypeValue (Request $request)
    {
        $typeFilter = $request->get('typeFilter');
        $filterValue = app(FilterService::class);
        $filterValue::setTypeFilter($typeFilter);
        $filterValue = $filterValue::getFilterTypeValue();

        return $filterValue->toJson();
    }

    public function filterMain(Request $request)
    {
        $Characteristic = app(CharacteristicService::class);
        $Characteristic->setGroupId($request->get('groupId'));
        $Characteristic->setTypeCharacteristic($request->get('typeCharacteristic'));
        $Characteristic = $Characteristic->getCharacteristic();

        return $Characteristic->toJson();
    }

    public function filterTires(Request $request)
    {
        $Characteristic = app(CharacteristicService::class);
        $Characteristic->setGroupId(self::GROUP_TIRES);
        $Characteristic->setTypeCharacteristic($request->get('typeCharacteristic'));
        $Characteristic = $Characteristic->getCharacteristic()->toJson();

        return $Characteristic;
    }
    public function filterRims(Request $request)
    {
        $Characteristic = app(CharacteristicService::class);
        $Characteristic->setGroupId(self::GROUP_RIMS);
        $Characteristic->setTypeCharacteristic($request->get('typeCharacteristic'));
        $Characteristic = $Characteristic->getCharacteristic()->toJson();

        return $Characteristic;
    }




}
