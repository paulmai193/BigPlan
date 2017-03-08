<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\EndUserService;

class EndUserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->singleton(EndUserService::class, function ($app) {
        //    return new EndUserService();
        //});
    }
}
