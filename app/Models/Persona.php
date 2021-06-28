<?php

namespace App\Models;

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

    public function refenciados()
    {
        return $this->hasMany(Persona::class);
    }

    public function referencia()
    {
        return $this->belongsTo(Persona::class);
    }

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

    /** OBSRVACIONES  */
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
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

    public function pais(){
        return $this->belongsTo(Pais::class);
    }

    /**
     * Get the ciudad that owns the Persona
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    /**
     * Get the zona that owns the Persona
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }


    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
    

    public function isEstudiante()
    {
        $estudiante = Estudiante::where('persona_id', '=', $this->id)->count();

        if ($estudiante > 0) {
            $respuesta = true;
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function isComputacion()
    {
        return Estudiante::where('persona_id', '=', $this->id)->count()>0;
    }

    public function isDocente()
    {
        $respuesta = Docente::where('persona_id', '=', $this->id)->count();
        if ($respuesta > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isClicopy()
    {
        $respuesta = Clicopy::where('persona_id', '=', $this->id)->count();
        if ($respuesta > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isCliservicio()
    {
        $respuesta = Cliservicio::where('persona_id', '=', $this->id)->count();
        if ($respuesta > 0) {
            return true;
        } else {
            return false;
        }
    }

}




