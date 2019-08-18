<?php

use App\Food;
use App\Routine;
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
        $cantidadFood = 100;
        factory(Food::class, $cantidadFood)->create();

        Routine::truncate();
        $cantidadRoutine = 10;
        factory(Routine::class, $cantidadRoutine)->create();

    }
}
