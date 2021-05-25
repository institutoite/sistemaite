<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacion extends Model
{
    use HasFactory;
    protected $dates = [
        'fecha','hora_ini','hora_fin', 'fecha_proximo_pago','created_at', 'updated_at',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hora_ini', 'hora_fin', 'fecha','fecha_proximo_pago', 'habilitado', 'estado', 'docente_id', 'materia_id', 'aula_id',
    ];

   

    /** OBSRVACIONES  */
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
    public function inscripcion()
    {
        return $this->belongsTo(Inscripcione::class);
    }
}
