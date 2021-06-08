<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    public function clase(){
        return $this->belongsTo(Clase::class);
    }

    public function programacion(){
        return $this->hasOne(Programacion::class);
    }


}
