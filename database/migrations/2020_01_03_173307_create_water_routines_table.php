<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_routine', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora');
            $table->integer('cantidad')->unsigned();
            $table->boolean('lunes')->default(0);
            $table->boolean('martes')->default(0);
            $table->boolean('miercoles')->default(0);
            $table->boolean('jueves')->default(0);
            $table->boolean('viernes')->default(0);
            $table->boolean('sabado')->default(0);
            $table->boolean('domingo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_routine');
    }
}
