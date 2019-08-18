<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('routine', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora');
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
        Schema::dropIfExists('routine');
    }
}
