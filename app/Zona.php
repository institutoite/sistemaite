<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable=[
        'zona',
        'ciudad_id',
    ];

    public static function zonas($id){
        return Zona::where('ciudad_id','=',$id)->get();
    }
}
