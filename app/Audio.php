<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audio';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'url', 
        'filename',
    ];
}
