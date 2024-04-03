<?php

namespace App\Http\Controllers;

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

    /**
     * @param string $view
     * @param array $parameters
     */
    protected function renderView(string $view, array $parameters = [])
    {
        return view($view, $parameters)->render();
    }

    protected function isErrorPage($data)
    {
        if (!$data) {
            abort(404);
        }
    }

}
