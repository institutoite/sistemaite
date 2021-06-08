<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Docente extends Model
{
    use HasFactory;


    protected $fillable = [
        'fecha_ingreso',
        'dias_prueba',
        'nombre',
        'sueldo',
        'estado',
        'persona_id',
    ];
    protected $dates = [
        'fecha_ingreso',
    ];


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
        return $this->morphToMany(Materia::class,'materiable');
    }

    public function sesion()
    {
        return $this->hasOne(Sesion::class);
    }
    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}
