<?php

namespace App\Providers;

use App\Services\LocalizationService;
use Illuminate\Support\ServiceProvider;
class LocalizationServiceProvider extends  ServiceProvider
{
    public function register()
    {
        $this->app->bind("LocalizationService", LocalizationService::class);
    }
}
