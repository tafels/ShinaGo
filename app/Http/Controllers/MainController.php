<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MainController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
//    public function __invoke(Request $request)
//    {
//        //
//    }

    public function index(Request $request)
    {

        return view('index');
    }

    public function category(Request $request)
    {
        return 'dsfdsfdsf';
    }
    public function post(Request $request)
    {
        return view('page');
    }
    public function page(Request $request)
    {
        return view('page');
    }
}
