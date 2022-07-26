<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $monto
 * @property $pagocon
 * @property $cambio
 * @property $pagable_id
 * @property $pagable_type
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    static $rules = [
		'monto' => 'required',
		'pagocon' => 'required',
		'cambio' => 'required',
		'pagable_id' => 'required',
		'pagable_type' => 'required',
    ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['monto','pagocon','cambio','pagable_id','pagable_type'];


  public function billetes()
  {
    return $this->morphToMany(Billete::class, 'billetable')->withPivot('cantidad', 'tipo')->withTimestamps();;
  }
  
  public function pagable()
  {
    return $this->morphTo();
  }
  
  public function usuarios()
  {
      return $this->morphToMany('App\Models\User', 'userable');
  }
}
