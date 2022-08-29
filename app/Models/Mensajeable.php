<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajeable extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table="mensajeables";
    protected $fillable=[
        'mensaje_id',
        'mensajeable_id',
        'mensajeable_type',
        'persona_id',
    ];
}
