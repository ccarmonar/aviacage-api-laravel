<?php

namespace App\Http\Controllers\WaterRoutine;

use App\WaterRoutine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Traits\macro;
use App\Http\Controllers\ApiController;

class WaterRoutineController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutinas = DB::table('water_routine')->get();

        /*return response()->json([
            'hora' => $rutina->hora,
            'dias' => 'CA'
        ]);*/

        $data = array();
        foreach ($rutinas as $rutina) {
            $dias = array();
            if($rutina->lunes === 1){
                array_push($dias,'lunes');
            }
            if($rutina->martes === 1){
                array_push($dias,'martes');
            }
            if($rutina->miercoles === 1){
                array_push($dias,'miercoles');
            }
            if($rutina->jueves === 1){
                array_push($dias,'jueves');
            }
            if($rutina->viernes === 1){
                array_push($dias,'viernes');
            }
            if($rutina->sabado === 1){
                array_push($dias,'sabado');
            }
            if($rutina->domingo === 1){
                array_push($dias,'domingo');
            }
            array_push($data,
                array(
                    'id' => $rutina->id,
                    'hora' => $rutina->hora,
                    'cantidad' => $rutina->cantidad,
                    'dias' => $dias
                )
            );
        }
        return response()->json($data,200);
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
        //$food = Routine::create($campos);
        $routine = new WaterRoutine();
        $routine->hora = $campos['hora'];
        $routine->cantidad = $campos['cantidad'];
        
        foreach ($campos['dias'] as $dia) {
            if ($dia === "lunes"){
                $routine->lunes = 1;
            }
            if ($dia === "martes"){
                $routine->martes = 1;
            }
            if ($dia === "miercoles"){
                $routine->miercoles = 1;
            }
            if ($dia === "jueves"){
                $routine->jueves = 1;
            }
            if ($dia === "viernes"){
                $routine->viernes = 1;
            }
            if ($dia === "sabado"){
                $routine->sabado = 1;
            }
            if ($dia === "domingo"){
                $routine->domingo = 1;
            }
        }


        $routine->save();


        return response()->json([
                'id' => $routine->id,
                'hora' => $campos['hora'],
                'cantidad' => $campos['cantidad'],
                'dias' => $campos['dias']
            ]
        ,200);

        #return $this->showOne($routine);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WaterRoutine  $waterRoutine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rutina = DB::table('water_routine')->where('id',$id)->first();

        /*return response()->json([
            'hora' => $rutina->hora,
            'dias' => 'CA'
        ]);*/

        $dias = array();

        if($rutina->lunes === 1){
            array_push($dias,'lunes');
        }
        if($rutina->martes === 1){
            array_push($dias,'martes');
        }
        if($rutina->miercoles === 1){
            array_push($dias,'miercoles');
        }
        if($rutina->jueves === 1){
            array_push($dias,'jueves');
        }
        if($rutina->viernes === 1){
            array_push($dias,'viernes');
        }
        if($rutina->sabado === 1){
            array_push($dias,'sabado');
        }
        if($rutina->domingo === 1){
            array_push($dias,'domingo');
        }

        return response()->json([
                'id' => $rutina->id,
                'hora' => $rutina->hora,
                'cantidad' => $rutina->cantidad,
                'dias' => $dias
                ]
            ,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WaterRoutine  $waterRoutine
     * @return \Illuminate\Http\Response
     */
    public function edit(WaterRoutine $waterRoutine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WaterRoutine  $waterRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WaterRoutine $waterRoutine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WaterRoutine  $waterRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rutina = DB::table('water_routine')->where('id',$id)->first();

        /*return response()->json([
            'hora' => $rutina->hora,
            'dias' => 'CA'
        ]);*/

        $dias = array();

        if($rutina->lunes === 1){
            array_push($dias,'lunes');
        }
        if($rutina->martes === 1){
            array_push($dias,'martes');
        }
        if($rutina->miercoles === 1){
            array_push($dias,'miercoles');
        }
        if($rutina->jueves === 1){
            array_push($dias,'jueves');
        }
        if($rutina->viernes === 1){
            array_push($dias,'viernes');
        }
        if($rutina->sabado === 1){
            array_push($dias,'sabado');
        }
        if($rutina->domingo === 1){
            array_push($dias,'domingo');
        }

        DB::table('water_routine')->where('id',$id)->delete();

        return response()->json([
                'id' => $rutina->id,
                'hora' => $rutina->hora,
                'cantidad' => $rutina->cantidad,
                'dias' => $dias
                ]
            ,200);
    }
}
