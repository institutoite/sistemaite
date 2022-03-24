<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificable extends Model
{
    use HasFactory;

    public function calificable()
    {
        return $this->morphTo();
    }
}
