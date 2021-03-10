<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable=[
        'nombrepais'
    ];
    protected $table = 'pais'; 
}
