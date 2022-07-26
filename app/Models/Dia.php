<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;


    /* aqui va todo lo que es diable solo cabiar la clase y nombre de metodo*/

    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }
    public function sesioncom()
    {
        return $this->belongsTo(Sesion::class);
    }
    public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
    
}
