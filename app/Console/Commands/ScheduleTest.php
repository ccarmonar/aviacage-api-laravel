<?php

namespace App\Console\Commands;

use App\Food;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
require 'vendor/autoload.php';
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        
        $dia = Carbon::now()->dayOfWeek;
        $hora = Carbon::now('America/Rosario')->format('H:i:00');
        $rutinas = DB::table('routine')->get();


        foreach ($rutinas as $rutina) {
            if ($hora === $rutina->hora && $rutina->lunes == 1 && $dia == 1){
                /*
                $food = new Food();
                $food->cantidad = 888;  
                $food->fecha = "2021-09-19";
                $food->hora = "00:00:01";
                $food->save();
                */
                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd


                #echo "Hola";

    
            }
            if ($hora === $rutina->hora && $rutina->martes == 1 && $dia == 2){
                

                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd

                #echo "Hola";
                echo "AAAAAAAAAAAAAAAAAAAAAH";
            }
            if ($hora === $rutina->hora && $rutina->miercoles == 1 && $dia == 3){
                

                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd

                #echo "Hola";
            }
            if ($hora === $rutina->hora && $rutina->jueves == 1 && $dia == 4){
                

                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd

                #echo "Hola";
            }
            if ($hora === $rutina->hora && $rutina->viernes == 1 && $dia == 5){
                

                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd

                #echo "Hola";
            }
            if ($hora === $rutina->hora && $rutina->sabado == 1 && $dia == 6){
                

                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd

                #echo "Hola";
            }
            if ($hora === $rutina->hora && $rutina->domingo == 1 && $dia == 0){
                

                #Aqui va el socket o la llamada al rabbit para ejecutar la weaita xd

                #echo "Hola";
            }
            else {
                echo "\n";
                echo "Nada";
            }
            echo "\n";
            echo $rutina->id;


        }


    }
}
