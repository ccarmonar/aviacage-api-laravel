<?php

use App\Food;
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
        $cantidadFood = 300;
        factory(Food::class, $cantidadFood)->create();
    }
}
