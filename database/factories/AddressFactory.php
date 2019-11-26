<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'description' => $faker->text(200),
        'village' => $faker->buildingNumber,
        'block' => $faker->streetName,
        'tehshil' => $faker->city,
    ];
});
