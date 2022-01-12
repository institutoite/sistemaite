<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipomotivo extends Model
{
    use HasFactory; 

     public function motivos()
    {
        return $this->hasMany('App\Models\Motivo');
    }
}
