<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public function carrera()
    {
        return $this->belongsTo('App\Models\Carrera');
    }
    public function computaciones()
    {
        return $this->belongsToMany('App\Models\Computacion');
    }

    
}
