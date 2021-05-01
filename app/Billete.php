<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billete extends Model
{
    use HasFactory;
    public function billetable()
    {
        return $this->morphTo();
    }
}
