<?php

namespace App\Http\Controllers\Water;

use App\Water;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Traits\macro;
use App\Http\Controllers\ApiController;

class WaterController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $water = Water::all();
        return $this->showAll($water);
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


        //PENDIENTE
        /*Lamada a RabbitMQ
        $client = new \GuzzleHttp\Client();
        $url = "https://aviacage-rabbit.herokuapp.com/addcomida/";
        $gramos = $campos['cantidad'];
        $consulta = $url . $gramos;
        $request = $client->get($consulta);
        */

        $water = new Water();
        $water->cantidad = $campos['cantidad'];
        $water->fecha = $campos['fechaFormato'];
        $water->hora = $campos['hora'];
        $water->save();

        return $this->showOne($water);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $water = DB::table('water')
            ->select('water.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->where('id',$id);


        $waterFormato = DB::table( DB::raw("({$water->toSql()}) t") )
            ->mergeBindings($water) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->first();        

        return $this->showOne2($waterFormato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function edit(Water $water)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $water = Water::findOrFail($id);

        if ($request->has('cantidad')) {
            $water->cantidad = $request->cantidad;
        }
        if ($request->has('fecha')) {
            $water->fecha = $request->fecha;
        }
        if ($request->has('hora')) {
            $water->hora = $request->hora;
        }

        if (!$water->isDirty()) {
            //return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar', 'code' => 422], 422);
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $water->save();
        return $this->showOne($water);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Water  $water
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $water = Water::findOrFail($id);
        $water->delete();
        return $this->showOne($water);
    }

    public function indexcantidadA()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM water ORDER BY fecha,hora) t
        */


        $water = DB::table('water')
            ->select('water.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('cantidad','asc')
            ->orderBy('fecha','asc')
            ->orderBy('hora', 'asc');

        $waterFormato = DB::table( DB::raw("({$water->toSql()}) t") )
            ->mergeBindings($water) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($water,200);
        return $this->showAll($waterFormato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexcantidadD()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM water ORDER BY fecha,hora) t
        */


        $water = DB::table('water')
            ->select('water.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('cantidad','desc')
            ->orderBy('fecha','desc')
            ->orderBy('hora', 'desc');

        $waterFormato = DB::table( DB::raw("({$water->toSql()}) t") )
            ->mergeBindings($water) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($water,200);
        return $this->showAll($waterFormato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexfechaA()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM water ORDER BY fecha,hora) t
        */


        $water = DB::table('water')
            ->select('water.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('fecha','asc')
            ->orderBy('hora', 'asc');

        $waterFormato = DB::table( DB::raw("({$water->toSql()}) t") )
            ->mergeBindings($water) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($water,200);
        return $this->showAll($waterFormato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexfechaD()
    {
        
        /* 
        SELECT t.id,t.cantidad,t.fechaFormato,t.hora FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM water ORDER BY fecha,hora) t
        */


        $water = DB::table('water')
            ->select('water.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('fecha','desc')
            ->orderBy('hora', 'desc');

        $waterFormato = DB::table( DB::raw("({$water->toSql()}) t") )
            ->mergeBindings($water) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();



        //return response()->json($water,200);
        return $this->showAll($waterFormato);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexwater7()
    {
        
        /* 
        SELECT t.fechaFormato,SUM(t.cantidad) AS cantidadTotal,DAYNAME(t.fecha) AS dia FROM (SELECT *, DATE_FORMAT(fecha,'%d/%m/%Y') AS fechaFormato FROM water) t WHERE fecha > NOW() - INTERVAL 7 DAY GROUP BY fechaFormato ORDER BY fechaFormato;
        */


        $from = date('Y-m-d',strtotime("-6 days"));
        $to = date('Y-m-d');

        DB::statement("SET lc_time_names = 'es_ES'");


        $water = DB::table('water')
            ->select('water.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"));


        $waterFormato = DB::table( DB::raw("({$water->toSql()}) as t") )
            ->mergeBindings($water) 
            ->select('t.fechaFormato',DB::raw("DAYNAME(t.fecha) as dia,SUM(t.cantidad) as cantidadTotal"))
            ->whereBetween('t.fecha',[$from,$to])
            ->orderBy('t.fecha','asc')
            ->groupBy('t.fecha')            
            ->get();


        foreach ($waterFormato as $ff) {
            $ff->dia = ucwords($ff->dia);
        }

        //return response()->json($waterFormato,200, [],JSON_NUMERIC_CHECK);
        return $this->showAll($waterFormato);
    }




}
