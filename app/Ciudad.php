<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable=[
        'ciudad',
        'pais_id'
    ];
}
