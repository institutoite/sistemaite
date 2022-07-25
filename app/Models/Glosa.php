<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glosa extends Model
{
    use HasFactory;
    public function usuario()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
