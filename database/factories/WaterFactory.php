<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Water;
use Faker\Generator as Faker;

$factory->define(Water::class, function (Faker $faker) {
    return [
        'cantidad' => $faker->numberBetween($min = 50, $max = 1000),
        'fecha' => $faker->dateTimeBetween($startDate = '- 10 days', $endDate = 'now', $timezone = 
            'Europe/Madrid'),
        'hora' => $faker->time($format = 'H:i:s'),
    ];
});
