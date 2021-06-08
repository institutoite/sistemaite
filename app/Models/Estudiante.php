<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function grados(){
        return $this->belongsToMany(Grado::class);
    }
    public function colegios()
    {
        return $this->belongsToMany(Colegio::class);
    }

    public function inscripciones(){
        return $this->hasMany(Inscripcione::class);
    }

    /** OBSERVACIONES */
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
}
