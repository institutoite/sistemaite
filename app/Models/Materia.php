<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    
    public function temas() 
    {
        return $this->hasMany(Tema::class);
    }

    /* realcion de muchos a muchos inversa polimorfica*/
    public function niveles(){
        return $this->morphedByMany(Materia::class,'materiable');
    }

    /* realcion de muchos a muchos inversa polimorfica*/
    public function docentes()
    {
        return $this->morphedByMany(Docente::class, 'materiable');
    }
    public function sesion()
    {
        return $this->hasOne(Sesion::class);
    }
    public function clases()
    {
        return $this->hasMany(Clase::class);
    }

}