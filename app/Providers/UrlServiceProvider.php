<?php

namespace App\Providers;

use App\Services\UrlService;
use Illuminate\Support\ServiceProvider;

class UrlServiceProvider extends ServiceProvider
{
    public function register()
    {
//        $this->app->bind(UrlService::class, function ($app){
//            return new UrlService();
//        });
    }

    public function boot()
    {
        $this->app->bind('urlHelper', UrlService::class);
    }
}
