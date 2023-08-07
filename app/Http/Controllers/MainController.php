<?php

namespace App\Http\Controllers;

use App\Facades\FilterService;
use Illuminate\Http\Response;
use Request;

class MainController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Request $request)
    {
        FilterService::setIsMain(true);
        $filterItem = FilterService::getFilterItem();
        $filterValue = FilterService::getFilterValue();

//        dd($filterValue);

        return view('index', [
            'filterItem' => $filterItem,
            'filterValue' => $filterValue,
        ]);
    }
}
