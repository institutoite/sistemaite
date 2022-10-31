<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;
    public function planes()
    {
        return $this->hasMany(Plan::class);
    }
     public function usuarios()
    {
        return $this->morphToMany('App\Models\User', 'userable');
    }
}
