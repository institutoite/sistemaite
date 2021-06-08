<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    public function materia(){
        return $this->belongsTo(Materia::class);
    }
    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}
