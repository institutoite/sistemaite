<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombrepais'
    ];
    
    /**
     * Get the persona th owns the Pais
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->hasOne(Persona::class);
    }
    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
}


