<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipomotivo extends Model
{
    use HasFactory; 

    static $rules = [
		'tipomotivo' => 'required|min:5',
    ];

     public function motivos()
    {
        return $this->hasMany('App\Models\Motivo');
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
