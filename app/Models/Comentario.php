<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    public function como(){
        return $this->belongsTo(Como::class);
    }
    public function persona(){
        return $this->belognsTo(Persona::class);
    }
    public function interests() {
        return $this->belongsToMany(Interest::class)->withTimestamps();
    }
}