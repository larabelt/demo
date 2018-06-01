<?php

namespace App\Providers;

use Belt;
use Illuminate\Support\ServiceProvider;

class BeltElasticServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $global = [
            Belt\Elastic\Modifiers\IsActiveQueryModifier::class,
            Belt\Elastic\Modifiers\NameSortModifier::class,
            Belt\Elastic\Modifiers\NeedleQueryModifier::class,
        ];

        $modifiers = [
            'events' => [
                Belt\Spot\Elastic\Modifiers\RatingSortModifier::class,
            ],
            'pages' => [],
            'posts' => [],
            'places' => [
                Belt\Spot\Elastic\Modifiers\RatingSortModifier::class,
            ]
        ];

        # elastic
        foreach ($modifiers as $type => $classes) {
            Belt\Elastic\Engine::addModifiers($type, array_merge($global, $classes));
        }
    }

}