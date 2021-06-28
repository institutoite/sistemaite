<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 *
 * @property $id
 * @property $municipio
 * @property $provincia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Provincia $provincia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    
    static $rules = [
		'municipio' => 'required',
		'provincia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['municipio','provincia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provincia()
    {
        return $this->hasOne(Provincia::class);
    }
  public function userable()
  {
    return $this->morphOne('App\Models\Userable', 'userable');
  }

}
