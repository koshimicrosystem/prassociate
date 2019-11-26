<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unitmodel;
use Faker\Generator as Faker;

$factory->define(Unitmodel::class, function (Faker $faker) {
    return [
        'model_name' => $faker->unique()->lastName,
        'model_number' => $faker->unique()->numberBetween($min = 1000000, $max = 9000000),
        'description' => $faker->text($maxNbChars = 200),    
    ];
});
