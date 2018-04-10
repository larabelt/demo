<?php

namespace App\Providers;

use Belt;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @larabelt
         */
        Belt\Spot\Deal::observe(Belt\Core\Observers\IndexObserver::class);
        Belt\Spot\Event::observe(Belt\Core\Observers\IndexObserver::class);
        Belt\Spot\Place::observe(Belt\Core\Observers\IndexObserver::class);
    }
}