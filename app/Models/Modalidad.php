<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modalidad
 *
 * @property $id
 * @property $modalidad
 * @property $costo
 * @property $cargahoraria
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modalidad extends Model
{
    
    static $rules = [
		'modalidad' => 'required',
		'costo' => 'required',
		'cargahoraria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modalidad','costo','cargahoraria','nivel_id'];

  public function inscripcion()
  {
    return $this->hasOne(Inscripcione::class);
  }

  public function nivel()
  {
    return $this->belongsTo(Nivel::class);
  }

  public function userable()
  {
    return $this->morphOne('App\Models\Userable', 'userable');
  }

}
