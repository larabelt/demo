<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Belt\Content\Block::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(3, true),
        'template' => 'default',
        'body' => $faker->paragraphs(3, true),
    ];
});