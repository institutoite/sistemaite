<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminitrativo extends Model
{
    use HasFactory;
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
