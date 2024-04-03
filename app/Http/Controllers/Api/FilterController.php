<?php

namespace App\Http\Controllers\Api;

use App\Services\FilterService;
use Illuminate\Routing\Controller;
use App\Services\CharacteristicService;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    /**
     * @var FilterService
     */
    private $filterService;
    /**
     * @var CharacteristicService
     */
    private $characteristicService;

    /**
     * MainController construct
     */
    public function __construct(FilterService $filterService, CharacteristicService $characteristicService)
    {
        $this->filterService = $filterService;
        $this->characteristicService = $characteristicService;
    }

    const GROUP_TIRES = 1;
    const GROUP_RIMS = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \App\Services\FilterService
     */

    public function initFilter (Request $request)
    {
        return $this->filterService->createUrl($request);
    }

    public function getFilterValue (Request $request)
    {
        $isMain = $request->get('isMain');
        $filterService = $this->filterService->getFilterSection($isMain);

        return $filterService->toJson();
    }

    public function getFilterGroupValue (Request $request)
    {
        $isMain = $request->get('isMain');
        $typeFilter = $request->get('typeFilter');
        $filterValue = $this->filterService->getFilterSectionItem($isMain, $typeFilter);

        return $filterValue->toJson();
    }

    public function getFilterTypeValue (Request $request)
    {
        $isMain = $request->get('isMain');
        $typeFilter = $request->get('typeFilter');
        $filterValue = $this->filterService->getFilterSectionItem($isMain, $typeFilter);

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
        $typeCharacteristic = $request->get('typeCharacteristic');
        $characteristicService = $this->characteristicService->getCharacteristic(self::GROUP_TIRES, $typeCharacteristic);

        return $characteristicService->toJson();
    }
    public function filterRims(Request $request)
    {
        $typeCharacteristic = $request->get('typeCharacteristic');
        $characteristicService = $this->characteristicService->getCharacteristic(self::GROUP_RIMS, $typeCharacteristic);

        return $characteristicService->toJson();
    }




}
