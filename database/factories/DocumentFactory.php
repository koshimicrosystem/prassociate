<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    $type=$faker->randomElement(array ('Image','Pdf', 'Doc','Excal'));

    return [
        'name' => $faker->lastName,
        'number' => $faker->numberBetween(1000000000,9999999999),
        'url' => $faker->imageUrl($width = 640, $height = 480),
        'type' => $type,
    ];
});
