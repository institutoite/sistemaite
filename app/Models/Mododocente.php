<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mododocente extends Model
{
    use HasFactory;

    public function docente()
    {
        return $this->hasOne(Docente::class);
    } 
    public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
