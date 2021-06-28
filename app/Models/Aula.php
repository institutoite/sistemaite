<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public function sesion()
    {
        return $this->hasOne(Sesion::class);
    }
    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }

}
