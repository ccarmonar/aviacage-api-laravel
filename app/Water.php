<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $table = 'water';
    public $timestamps = false;
    protected $fillable = [
        'cantidad', 
        'fecha',
        'hora', 
    ];
}
