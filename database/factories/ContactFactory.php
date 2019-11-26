<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    $type=$faker->randomElement(array ('Name','Number'));
    $number_email = ($type == 'Name') ? $faker->unique()->email : $faker->numberBetween($min = 6000000000, $max = 9999999999);
    return [
        'name' => $faker->name,
        'type' => $type,
        'number_email' => $number_email,
    ];
});
