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
        $client = new \GuzzleHttp\Client();
        $dia = Carbon::now('America/Rosario')->dayOfWeek;
        $hora = Carbon::now('America/Rosario')->format('H:i:00');
        $rutinas = DB::table('routine')->get();


        $url = "https://aviacage-rabbit.herokuapp.com/addcomida/";
        $file = fopen('Task_Routine_Food_Historial.txt','a');

        foreach ($rutinas as $rutina) {
            if ($hora === $rutina->hora && $rutina->lunes == 1 && $dia == 1){

                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();
                

                $logmsg = "[".now('America/Rosario')."] - Lunes -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->martes == 1 && $dia == 2){
                
                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Martes -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
                
            }
            if ($hora === $rutina->hora && $rutina->miercoles == 1 && $dia == 3){
                

                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Miercoles -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;

                
                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->jueves == 1 && $dia == 4){
                
                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Jueves -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;

                
                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->viernes == 1 && $dia == 5){
               
                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Viernes -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->sabado == 1 && $dia == 6){
                

                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Sabado -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->domingo == 1 && $dia == 0){
                
                $gramos = $rutina->cantidad;
                $consulta = $url . $gramos;
                $request = $client->get($consulta);
                $response = $request->getBody();
                
                $logmsg = "[".now('America/Rosario')."] - Domingo -".$gramos." gramos - Rutina FOOD Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;

                echo $response;
            }
            else {
                $logmsg = "[".now('America/Rosario')."] - Rutina FOOD NO Ejecutada \n";
                echo $logmsg;
            }
        }
        fclose($file);

        

    }
}
