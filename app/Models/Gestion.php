<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;
    protected $table="estudiante_grado";
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
