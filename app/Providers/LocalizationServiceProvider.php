<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class LocalizationServiceProvider extends  ServiceProvider
{
    public function register()
    {
        $this->app->bind("LocalizationService", "App/Services/LocalizationService");
    }
}
