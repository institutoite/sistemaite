<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }

}
