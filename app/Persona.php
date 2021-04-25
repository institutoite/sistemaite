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

    protected $dates = [
        'fechanacimiento', 'created_at', 'updated_at',
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

   
    public function apoderados()
    {
        return $this->belongsToMany(Persona::class, 'persona_persona','persona_id', 'persona_id_apoderado')->withPivot('telefono', 'parentesco');
    }

    public function hijos()
    {
        return $this->belongsToMany(Persona::class, 'persona_persona', 'persona_id_apoderado', 'persona_id')->withPivot('telefono', 'parentesco'); // //, 
        //'telefonos', 'persona_id_parentesco', 'persona_id'
    }

}




