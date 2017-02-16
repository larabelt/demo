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

$factory->define(Belt\Core\PublishHistory::class, function (Faker\Generator $faker) {
    return [
        'path' => '/' . $faker->word,
        'hash' => md5($faker->word),
    ];
});