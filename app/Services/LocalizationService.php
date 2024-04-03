<?php

namespace App\Services;

use App;
use Illuminate\Support\Facades\Route;

class LocalizationService extends BaseService
{
    public function locale()
    {
        request()->setDefaultLocale(config("app.locale"));

        $locale = request()->segment(1, '');

        if($locale === config("app.locale")){
            abort(404);
        }

        if ($locale && in_array($locale, config("app.locales"))) {
            App::setLocale($locale);
            request()->setLocale($locale);
            return $locale;
        }

        return "";
    }

    public function getSelectLocaleRoute()
    {

        dd(Route::getCurrentRoute());
        return request();
    }
}
