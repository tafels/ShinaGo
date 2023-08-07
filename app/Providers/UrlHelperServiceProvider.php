<?php

namespace App\Providers;

use App\Services\UrlHelperService;
use Illuminate\Support\ServiceProvider;

class UrlHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('urlHelper', UrlHelperService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
