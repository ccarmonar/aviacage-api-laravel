<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\WaterRoutine;
use Faker\Generator as Faker;

$factory->define(WaterRoutine::class, function (Faker $faker) {
    return [
        'hora' => $faker->time($format = 'H:i'),
        'cantidad' => $faker->numberBetween($min = 5, $max = 70),
        'lunes' => $faker->boolean($chanceOfGettingTrue = 50),
        'martes' => $faker->boolean($chanceOfGettingTrue = 50),
        'miercoles' => $faker->boolean($chanceOfGettingTrue = 50),
        'jueves' => $faker->boolean($chanceOfGettingTrue = 50),
        'viernes' => $faker->boolean($chanceOfGettingTrue = 50),
        'sabado' => $faker->boolean($chanceOfGettingTrue = 50),
        'domingo' => $faker->boolean($chanceOfGettingTrue = 50)
    ];
});
