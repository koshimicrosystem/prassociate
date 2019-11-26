<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use App\Unitmodel;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    $steering=$faker->randomElement(array ('Power','hydraulic', 'electric'));
    $clutch=$faker->randomElement(array ('Positive','Dog', 'Vacuum'));
    $pto=$faker->randomElement(array ('Independent','mechanical', 'Control lever'));
    return [
        'model_name' => $faker->lastName,
        'grn_number' => $faker-> unique()->numberBetween($min = 1000000, $max = 9000000),
        'invoice_number' => $faker-> unique()->numberBetween($min = 1000000, $max = 9000000),
        'received_at' => $faker-> dateTimeBetween($startDate = '-2 years', $endDate = 'now',$timezone = null),
        'steering_type' => $steering,
        'clutch_type' => $clutch ,
        'pto_type' => $pto ,
        'ndp' => $faker->numberBetween($min = 7000000, $max = 9000000),
        'material_code' => $faker->numberBetween($min = 1000000, $max = 9000000),
        'tr_sr_number' => $faker-> unique()->numberBetween($min = 1000000, $max = 9000000),
        'engine_number' => $faker-> unique()->numberBetween($min = 1000000, $max = 9000000),
        'chassis_number' => $faker-> unique()->numberBetween($min = 1000000, $max = 9000000),
        'sold' => 0,
        'order_number' => $faker->  unique()->numberBetween($min = 1000000, $max = 9000000),
        'invoice_amount' => $faker-> unique()->numberBetween($min = 7000000, $max = 9000000),
        'gst_applicable' => $faker-> boolean($chanceOfGettingTrue = 80),
    ];
});
