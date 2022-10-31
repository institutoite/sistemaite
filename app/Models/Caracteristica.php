<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
