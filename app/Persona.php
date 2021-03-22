<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable=[
            'id',
            'nombre',
            'apellidop',
            'apellidom',
            'fechanacimiento',
            'direccion',
            'carnet',
            'expedido',
            'genero',
            'observacion',
            'foto',
            'como',
            'persona_id',
            'pais_id',
            'ciudad_id',
            'zona_id',
            'idantiguo'
    ];
}
