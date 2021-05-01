<?php

namespace App;

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
    return $this->belongsTo(Inscripcione::class);
  }

  public function nivel()
  {
    return $this->hasOne(Nivel::class);
  }

}
