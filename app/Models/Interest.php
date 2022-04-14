<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    use HasFactory;

    public function personas() {
        return $this->belongsToMany(Persona::class);
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
