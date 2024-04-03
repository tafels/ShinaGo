<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class BaseService
{

    protected function isActiveCache()
    {
        return env('APP_CACHE', false);
    }

}
