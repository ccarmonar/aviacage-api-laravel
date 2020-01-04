<?php

namespace App\Http\Controllers\Food;

use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Traits\macro;
use App\Http\Controllers\ApiController;


class FoodController extends ApiController
{
    public function index()
    {
        $food = Food::all();
        return $this->showAll($food);
    }

    public function store(Request $request)
    {   
        $campos = $request->json()->all();

        //Lamada a RabbitMQ
        $client = new \GuzzleHttp\Client();
        $url = "https://aviacage-rabbit.herokuapp.com/addcomida/";
        $gramos = $campos['cantidad'];
        $consulta = $url . $gramos;
        $request = $client->get($consulta);
        
        $food = new Food();
        $food->cantidad = $campos['cantidad'];
        $food->fecha = $campos['fechaFormato'];
        $food->hora = $campos['hora'];
        $food->save();

        return $this->showOne($food);
    }

    public function show($id)
    {
        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->where('id',$id);


        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->first();        

        return $this->showOne2($foodFormato);
    }

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
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $food->save();
        return $this->showOne($food);
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return $this->showOne($food);
    }

    public function indexcantidadA()
    {
        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('cantidad','asc')
            ->orderBy('fecha','asc')
            ->orderBy('hora', 'asc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();

        return $this->showAll($foodFormato);
    }

    public function indexcantidadD()
    {
        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('cantidad','desc')
            ->orderBy('fecha','desc')
            ->orderBy('hora', 'desc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();
        return $this->showAll($foodFormato);
    }

    public function indexfechaA()
    {
        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('fecha','asc')
            ->orderBy('hora', 'asc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();
        return $this->showAll($foodFormato);
    }

    public function indexfechaD()
    {
        $food = DB::table('food')
            ->select('food.*',DB::raw("DATE_FORMAT(fecha, '%d/%m/%Y') as fechaFormato"))
            ->orderBy('fecha','desc')
            ->orderBy('hora', 'desc');

        $foodFormato = DB::table( DB::raw("({$food->toSql()}) t") )
            ->mergeBindings($food) 
            ->select('t.id', 't.cantidad','t.fechaFormato','t.hora')
            ->get();
        return $this->showAll($foodFormato);
    }

    public function indexfood7()
    {
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
        return $this->showAll($foodFormato);
    }
}
