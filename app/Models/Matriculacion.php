<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{
    use HasFactory;
    protected $table="asignatura_computacion";
    

    public function motivo()
    {
        return $this->hasOne('App\Models\Motivo');
    }
    public function sesionecoms()
    {
        return $this->hasMany('App\Models\Sesioncom');
    }
    public function programacionescom()
    {
        return $this->hasMany('App\Models\Programacioncom');
    }
}
