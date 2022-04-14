<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;


    protected $fillable = [
        'carrera'
    ];

    public function compuptaciones()
    {
        return $this->belongsToMany('App\Models\Computacion');
    }

    public function asignaturas()
    {
        return $this->hasMany('App\Models\Asignatura');
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
