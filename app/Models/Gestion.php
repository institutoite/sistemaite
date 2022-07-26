<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;
    protected $table="estudiante_grado";
    public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
