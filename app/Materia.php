<?php

namespace App;

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
        return $this->morphedByMany('App\Nivel','materiable');
    }

    /* realcion de muchos a muchos inversa polimorfica*/
    public function docentes()
    {
        return $this->morphedByMany('App\Docente', 'materiable');
    }
    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }

}
