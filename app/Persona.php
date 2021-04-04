<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
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

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class);
    }
    public function docente()
    {
        return $this->hasOne(Docente::class);
    }
    public function cliservicio()
    {
        return $this->hasOne(Cliservicio::class);
    }
    public function Administrativo()
    {
        return $this->hasOne(Estudiante::class);
    }
}




