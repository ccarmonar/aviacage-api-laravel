<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'cantidad' => $faker->numberBetween($min = 10, $max = 200),
        'fecha' => $faker->dateTimeBetween($startDate = '- 10 days', $endDate = 'now', $timezone = 
            'Europe/Madrid'),
        'hora' => $faker->time($format = 'H:i:s'),
    ];
});
