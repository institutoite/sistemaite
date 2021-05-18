<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Billete
 *
 * @property $id
 * @property $billete200
 * @property $billete100
 * @property $billete50
 * @property $billete20
 * @property $billete10
 * @property $moneda5
 * @property $moneda2
 * @property $moneda1
 * @property $moneda50
 * @property $moneda20
 * @property $moneda10
 * @property $dolares100
 * @property $dolares50
 * @property $dolares20
 * @property $dolares10
 * @property $dolares5
 * @property $dolares1
 * @property $pagable_id
 * @property $pagable_type
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Billete extends Model
{
    
    static $rules = [
		'pagable_id' => 'required',
		'pagable_type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable=[
                        'billete200',
                        'billete100',
                        'billete50',
                        'billete20',
                        'billete10',
                        'moneda5',
                        'moneda2',
                        'moneda1',
                        'moneda50',
                        'moneda20',
                        'moneda10',
                        'dolares100',
                        'dolares50',
                        'dolares20',
                        'dolares10',
                        'dolares5',
                        'dolares1',
                        'pago_id',
                        'tipo',
                      ];

  public function pago()
  {
    return $this->belongsTo(Pago::class);
  }

}
