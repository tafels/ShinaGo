<?php

namespace App\Http\Controllers;

use App\Models\Characteristic;
use App\Services\CatalogService;
use App\Services\CharacteristicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CatalogController extends RouteController
{

    /**
     * @var CatalogService
     */
    private $catalogService;

    /**
     * CatalogController construct
     */
    public function __construct()
    {
        $this->catalogService = app(CatalogService::class);
    }

    /**
     * @param Request $request
     * @return object|false
     */
    public function init()
    {

        $this->catalogService->initRouteCatalog();
        if(!$this->catalogService->getCatalogId()){
            return false;
        }
        $this->catalogService->findView();

        $Characteristic = app(CharacteristicService::class);

        $Characteristic->setGroupId(1);
        $Characteristic->setTypeCharacteristic('b');

          $Characteristic =  $Characteristic->getCharacteristic();

//        $names = $Characteristic->getBrands()->get();

        dump($Characteristic);

//        $this->catalogService->getContent();
//        $this->catalogService->getLanguage();

       // dump($this->catalogService);



        return View::make($this->catalogService->getView(), $this->catalogService->getParameters());

    }
}
