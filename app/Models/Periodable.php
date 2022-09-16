<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodable extends Model
{
    use HasFactory;
    protected $dates=[
        'fechaini','fechafin'
    ];
    public function periodable()
    {
        return $this->morphTo();
    }
    
}
