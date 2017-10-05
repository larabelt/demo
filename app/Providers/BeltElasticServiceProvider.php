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
            Belt\Content\Elastic\Modifiers\IsActiveQueryModifier::class,
            Belt\Content\Elastic\Modifiers\NameSortModifier::class,
            Belt\Content\Elastic\Modifiers\NeedleQueryModifier::class,
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
            Belt\Content\Elastic\ElasticEngine::addModifiers($type, array_merge($global, $classes));
        }
    }

}