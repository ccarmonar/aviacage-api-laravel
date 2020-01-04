<?php

use App\Food;
use App\Routine;
use App\Water;
use App\WaterRoutine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Food::truncate();
        $cantidadFood = 40;
        factory(Food::class, $cantidadFood)->create();

        Routine::truncate();
        $cantidadRoutine = 5;
        factory(Routine::class, $cantidadRoutine)->create();

        Water::truncate();
        $cantidadWater = 40;
        factory(Water::class, $cantidadWater)->create();

        WaterRoutine::truncate();
        $cantidadWaterRoutine = 5;
        factory(WaterRoutine::class, $cantidadWaterRoutine)->create();


    }
}
