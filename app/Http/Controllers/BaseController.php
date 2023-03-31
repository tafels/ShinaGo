<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller construct
     */
    public function __construct()
    {
    }

    public function breadcrumbs()
    {

    }

    /**
     * @param string $view
     * @param array $parameters
     * @return Application|Factory|View
     */
    public function renderView(string $view, array $parameters = [])
    {
        dump($parameters);
        return view($view , $parameters);
    }

}
