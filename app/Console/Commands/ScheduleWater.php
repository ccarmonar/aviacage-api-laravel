<?php

namespace App\Console\Commands;

use App\Food;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
require 'vendor/autoload.php';
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ScheduleWater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:water';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task water';

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
        $rutinas = DB::table('water_routine')->get();


        $url = "https://aviacage-rabbit.herokuapp.com/addagua/";
        $file = fopen('Task_Routines_Water_Historial.txt','a');

        foreach ($rutinas as $rutina) {
            if ($hora === $rutina->hora && $rutina->lunes == 1 && $dia == 1){

                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Lunes - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->martes == 1 && $dia == 2){
                
                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Martes - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->miercoles == 1 && $dia == 3){
                

                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();


                $logmsg = "[".now('America/Rosario')."] - Miercoles - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->jueves == 1 && $dia == 4){
                
                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();



                $logmsg = "[".now('America/Rosario')."] - Jueves - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;


                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->viernes == 1 && $dia == 5){
               
                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();



                $logmsg = "[".now('America/Rosario')."] - Viernes - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;



                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->sabado == 1 && $dia == 6){
                

                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();



                $logmsg = "[".now('America/Rosario')."] - Sabado - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;



                echo $response;
            }
            if ($hora === $rutina->hora && $rutina->domingo == 1 && $dia == 0){
                
                $mls = $rutina->cantidad;
                $consulta = $url . $mls;
                $request = $client->get($consulta);
                $response = $request->getBody();



                $logmsg = "[".now('America/Rosario')."] - Domingo - Cantidad:".$mls." mls - Rutina WATER Ejecutada \n";
                fwrite($file, $logmsg);
                echo $logmsg;



                echo $response;
            }
            else {

                $logmsg = "[".now('America/Rosario')."] - Rutina WATER NO Ejecutada \n";
                echo $logmsg;

            }


        }

        

    }
}
