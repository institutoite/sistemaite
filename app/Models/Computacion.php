<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computacion extends Model
{
    use HasFactory;
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
    public function carreras()
    {
        return $this->belongsToMany('App\Models\Carrera');
    }
    public function asignaturas()
    {
        return $this->belongsToMany('App\Models\Asignatura');
    }
}
