<?php

namespace App\Services;

use Illuminate\Support\Facades\Redirect;

class LocalizationService
{
    public function locale()
    {

        $locale = request()->segment(1, '');

        if($locale === config("app.locale")){
            abort(404);
        }

        if ($locale && in_array($locale, config("app.locales"))) {
            return $locale;
        }

        return "";
    }
}
