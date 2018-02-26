<?php

namespace App\Providers;

use App, Belt;
use Belt\Core\BeltServiceProvider as ServiceProvider;

/**
 * @larabelt
 */
class BeltServiceProvider extends ServiceProvider
{
    protected $workflows = [
        App\Workflows\TeamApproval::class,
        App\Workflows\PlaceApproval::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->workflows();
    }
}