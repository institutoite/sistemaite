<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipomotivo extends Model
{
    use HasFactory; 

     public function motivo()
    {
        return $this->hasOne('App\Models\Motivo');
    }
}
