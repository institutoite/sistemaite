<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteTurno extends Model
{
    use HasFactory;

    protected $fillable = [
        'docente_id',
        'dia_id',
        'hora_inicio',
        'hora_fin',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function dia()
    {
        return $this->belongsTo(Dia::class);
    }
}
