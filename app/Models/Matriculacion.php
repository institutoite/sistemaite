<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{
    use HasFactory;

    protected $dates = [
        'fechaini','fechafin','fecha_proximo_pago','created_at', 'updated_at',
    ];

    public function motivo()
    {
        return $this->belongsTo(Motivo::class);
    }
    public function sesionescoms()
    {
        return $this->hasMany('App\Models\Sesioncom');
    }
    public function programacionescom()
    {
        return $this->hasMany('App\Models\Programacioncom');
    }
    
    public function computacion()
    {
        return $this->belongsTo("App\Models\Computacion");
    }
    public function pagos()
    {
        return $this->morphMany(Pago::class, 'pagable');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
    

}
