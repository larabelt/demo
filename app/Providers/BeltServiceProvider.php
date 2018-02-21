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
        'teams.created' => App\Workflows\TeamApproval::class,
        'places.created' => App\Workflows\PlaceApproval::class,
        'places.updated' => App\Workflows\PlaceApproval::class,
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