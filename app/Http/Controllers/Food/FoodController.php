<?php

namespace App\Http\Controllers\Food;

use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Traits\macro;
use App\Http\Controllers\ApiController;


//  require dirname(__DIR__) . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;

use Enqueue\AmqpLib\AmqpConnectionFactory;

class FoodController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = Food::all();
        //return response()->json($food, 200);
        return $this->showAll($food);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $campos = $request->json()->all();
        //$food = Food::create($campos);
        $food = new Food();
        $food->cantidad = $campos['cantidad'];
        $food->fecha = $campos['fechaFormato'];
        $food->hora = $campos['hora'];
        $food->save();

        return $this->showOne($food);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->where('id',$id);


        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->first();        

        //return response()->json($foodFormato, 200);
        return $this->showOne2($foodFormato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        if ($request->has('cantidad')) {
            $food->cantidad = $request->cantidad;
        }
        if ($request->has('fecha')) {
            $food->fecha = $request->fecha;
        }
        if ($request->has('hora')) {
            $food->hora = $request->hora;
        }

        if (!$food->isDirty()) {
            //return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar', 'code' => 422], 422);
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $food->save();
        return $this->showOne($food);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        $food->delete();

        return $this->showOne($food);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexcantidadA()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM food ORDER BY fecha,hora) t
        */


        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('cantidad','asc')
            ->orderBy('fecha','asc')
            ->orderBy('hora', 'asc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($food,200);
        return $this->showAll($foodFormato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexcantidadD()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM food ORDER BY fecha,hora) t
        */


        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('cantidad','desc')
            ->orderBy('fecha','desc')
            ->orderBy('hora', 'desc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($food,200);
        return $this->showAll($foodFormato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexfechaA()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM food ORDER BY fecha,hora) t
        */


        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('fecha','asc')
            ->orderBy('hora', 'asc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($food,200);
        return $this->showAll($foodFormato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexfechaD()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM food ORDER BY fecha,hora) t
        */


        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('fecha','desc')
            ->orderBy('hora', 'desc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($food,200);
        return $this->showAll($foodFormato);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexfood7()
    {
        
        /* 
        SELECT t.fechaFormato,SUM(t.cantidad) AS cantidadTotal,DAYNAME(t.fecha) AS dia FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM food) t WHERE fecha > NOW() - INTERVAL 7 DAY GROUP BY fechaFormato ORDER BY fechaFormato;
        */


        $from = date('Y-m-d',strtotime("-6 days"));
        $to = date('Y-m-d');

        DB::statement("SET lc_time_names = 'es_ES'");


        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"));


        $foodFormato = DB::table( DB::raw("({$food->toSql()}) as t") )
            ->mergeBindings($food) 
            ->select('t.fechaFormato',DB::raw("DAYNAME(t.fecha) as dia,SUM(t.cantidad) as cantidadTotal"))
            ->whereBetween('t.fecha',[$from,$to])
            ->orderBy('t.fecha','asc')
            ->groupBy('t.fecha')            
            ->get();


        foreach ($foodFormato as $ff) {
            $ff->dia = ucwords($ff->dia);
        }

        //return response()->json($foodFormato,200, [],JSON_NUMERIC_CHECK);
        return $this->showAll($foodFormato);
    }

    public function foodpublisher(Request $request)
    {
        /*
        $campos = $request->json()->all();
        //$food = Food::create($campos);
        $food = new Food();
        $food->cantidad = $campos['cantidad'];
        $food->fecha = $campos['fechaFormato'];
        $food->hora = $campos['hora'];
        $food->save();
        */

        //require dirname(__DIR__) . '/vendor/autoload.php';


        $messageBody = json_encode($request->json()->all());
        $host = 'toad-01.rmq.cloudamqp.com';
        $port = 5672;
        $user = 'tuykqsbn';
        $pass = 'k8PceRIon7awLwPMvgrbNGH0oApLkMdq';
        $vhost = 'tuykqsbn';
        $exchange = 'subscribers';
        $queue = 'aviacage_subscribers';


        $connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
        $channel = $connection->channel();
        $channel->queue_declare($queue, false, true, false, false);
        $channel->exchange_declare($exchange, AMQPExchangeType::DIRECT, false, true, false);
        $channel->queue_bind($queue, $exchange);


        $message = new AMQPMessage($messageBody, array(
            'content_type' => 'application/json', 
            'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
        ));

        $channel->basic_publish($message, $exchange);


        $channel->close();
        $connection->close();

        error_log('Enviado JSON');

        return $request->json()->all();

    }

}
