<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Docente extends Model
{
    use HasFactory;

    

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }

    /** RELACION MUCHOS A MUCHO POLIMORFICO */
    public function materias(){
        return $this->morphToMany('App\Materia','materiable');
    }

    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }
}
