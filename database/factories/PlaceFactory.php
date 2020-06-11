<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Place::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->text(16383),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
