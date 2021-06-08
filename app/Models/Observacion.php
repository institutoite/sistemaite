<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Observacion
 *
 * @property $id
 * @property $Objetivo
 * @property $activo
 * @property $inscripcione_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Inscripcione $inscripcione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Observacion extends Model
{
    
    static $rules = [
		'activo' => 'required',
		'inscripcione_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Objetivo','activo','inscripcione_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function observable()
    {
        return $this->morphTo();
    }
    

}
