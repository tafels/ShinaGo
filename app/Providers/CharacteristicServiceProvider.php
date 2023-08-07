<?php

namespace App\Providers;

use App\Services\CharacteristicService;
use Illuminate\Support\ServiceProvider;

class CharacteristicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CharacteristicService',CharacteristicService::class);
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
