<?php

namespace App\Console\Commands;

use App\Food;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
require 'vendor/autoload.php';
use Carbon\Carbon;

class ScheduleTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*
        $food = new Food();
        $food->cantidad = 666;
        $food->fecha = "2021-09-19";
        $food->hora = "00:00:00";
        $food->save();
        */
        $dia = Carbon::now('America/Rosario')->format('l');
        $hora = Carbon::now('America/Rosario')->format('g:i');
        if ($hora === '1:37'){
            $food = new Food();
            $food->cantidad = 707;
            $food->fecha = "2021-09-19";
            $food->hora = "00:00:00";
            $food->save();
            echo "Hola";
        }
        if ($hora === '1:36'){
            $food = new Food();
            $food->cantidad = 706;
            $food->fecha = "2021-09-19";
            $food->hora = "00:00:00";
            $food->save();
            echo "Hola";
        } 
        if ($hora === '1:40'){
            $food = new Food();
            $food->cantidad = 710;
            $food->fecha = "2021-09-19";
            $food->hora = "00:00:00";
            $food->save();
            echo "Hola";
        }
        else {
            $food = new Food();
            $food->cantidad = 705;
            $food->fecha = "2021-09-19";
            $food->hora = "00:00:00";
            $food->save();
            echo "Chao";
        }



        

        
    }
}
