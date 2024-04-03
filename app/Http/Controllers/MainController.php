<?php

namespace App\Http\Controllers;

use App\Services\FilterService;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public $filterService;

    /**
     * @param FilterService $filterService
     */
    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return object|false
     */
    public function index(Request $request)
    {
        return $this->renderView('index', [
            'filterSection' => $this->filterService->getFilterSection(true),
            'filterSectionItem' => $this->filterService->getFilterSectionItem(true),
        ]);
    }
}
