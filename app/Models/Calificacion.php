<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
