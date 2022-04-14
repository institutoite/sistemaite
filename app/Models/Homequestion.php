<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homequestion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}
