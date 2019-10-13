<?php

namespace App\Http\Controllers\Audio;

use App\Audio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $audio = DB::table('audio')->get();
        return response()->json($audio,200);
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
        $audio = new Audio();
        $audio->nombre = $campos['nombre'];
        $audio->url = $campos['url'];
        $audio->save();
        return response()->json($audio,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $audio = DB::table('audio')->where('id',$id)->first();
        return response()->json($audio,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $audio = Audio::findOrFail($id);

        if ($request->has('nombre')) {
            $audio->nombre = $request->nombre;
        }
        if ($request->has('url')) {
            $audio->url = $request->url;
        }
        if (!$audio->isDirty()) {
            //return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar', 'code' => 422], 422);
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }
        $audio->save();
        return response()->json($audio,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audio = Audio::findOrFail($id);
        $audio->delete();
        return response()->json($audio,200);
    }
}
