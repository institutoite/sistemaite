<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Motivo
 *
 * @property $id
 * @property $motivo
 * @property $created_at
 * @property $updated_at
 *
 * @property Inscripcione[] $inscripciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Motivo extends Model
{
    
    static $rules = [
		'motivo' => 'required',
        'tipomotivo_id'=>'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['motivo'];
    /** 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripciones()
    {
        return $this->hasMany('App\Models\Inscripcione', 'motivo_id', 'id');
    }

    public function userable()
    {
        return $this->morphOne('App\Models\Userable', 'userable');
    }
    public function niveles()
    {
        return $this->morphToMany("App\Models\Nivel", 'nivelable');
    }
    
    public function matriculacion(){
        return $this->belongsTo("App\Models\Matriculacion");
    }
   
    public function tipomotivo(){
        return $this->belongsTo("App\Models\Tipomotivo");
    }

}
