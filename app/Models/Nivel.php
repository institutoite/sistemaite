<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nivel
 *
 * @property $id
 * @property $nivel
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nivel extends Model
{
    
    static $rules = [
		'nivel' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nivel','created_at'];

  /** RELACION MUCHOS A MUCHO POLIMORFICO */
  public function materias()
  {
    return $this->morphToMany(Materia::class, 'materiable');
  }

  public function modalidad()
  {
    return $this->hasOne(Modalidad::class);
  }

  public function userable()
  {
    return $this->morphOne('App\Models\Userable', 'userable');
  }
  public function grados()
  {
    return $this->hasMany(Nivel::class);
  }

}
