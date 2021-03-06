<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliservicio extends Model
{
    use HasFactory;
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
