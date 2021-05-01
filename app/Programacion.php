<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;
    public function inscripcion()
    {
        return $this->belongstTo(Inscripcione::class);
    }

    /** OBSRVACIONES  */
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}
