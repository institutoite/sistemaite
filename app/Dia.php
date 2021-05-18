<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;


    /* aqui va todo lo que es diable solo cabiar la clase y nombre de metodo*/
    public function inscripciones()
    {
        return $this->morphedByMany(Inscripcione::class, 'diable');
    }
}
