<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    
    public function inscricpiones()
    {
        return $this->belongsToMany(Inscripcione::class);
    }

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
    /* realcion de muchos a muchos inversa polimorfica*/
    public function inscripciones(){
        return $this->morphedByMany('App\Inscripcione', 'materiable');
    }
}
