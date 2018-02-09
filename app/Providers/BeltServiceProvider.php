<?php

namespace App\Providers;

use App, Belt, Event;
use Belt\Core\BeltServiceProvider as ServiceProvider;

/**
 * @larabelt
 */
class BeltServiceProvider extends ServiceProvider
{
    protected $workflows = [
        'teams' => App\Workflows\TeamApproval::class,
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
        //Belt\Core\Services\WorkflowService::enable();
        //$this->workflows();

        //Event::listen(Belt\Core\Events\TeamCreated::class, App\Workflows\TeamApproval::class);
        Event::listen('teams.created', App\Workflows\TeamApproval::class);
    }
}