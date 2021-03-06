<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clicopy extends Model
{
    use HasFactory;
    
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
