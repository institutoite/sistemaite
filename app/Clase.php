<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\License;

class Clase extends Model
{
    use HasFactory;
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    public function programacion()
    {
        return $this->belongsTo(Programacion::class);
    }

    public function licencia()
    {
        return $this->hasOne(Licencia::class);
    }

}
