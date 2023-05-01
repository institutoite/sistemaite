<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    use HasFactory;
    public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
      public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }

   
}
