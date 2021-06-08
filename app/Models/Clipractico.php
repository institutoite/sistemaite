<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clipractico extends Model
{
    use HasFactory;
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
}
