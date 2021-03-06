<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'horainicio',
        'horafin',
        'estado',
        'pagado',
        'docente_id',
        'materia_id',
        'aula_id',
        'tema_id',
        'programacion_id',

    ];
    protected $dates = [
        'fecha',
        'horainicio',
        'horafin',

    ];
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    public function programacion()
    {
        return $this->belongsTo(Programacion::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }

    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}