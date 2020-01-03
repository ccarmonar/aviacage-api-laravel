<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterRoutine extends Model
{
    protected $table = 'water_routine';
    public $timestamps = false;
    protected $fillable = [
        'hora', 
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo'
    ];
}
