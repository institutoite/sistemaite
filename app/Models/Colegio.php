<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Colegio
 *
 * @property $id
 * @property $nombre
 * @property $rue
 * @property $director
 * @property $direccion
 * @property $telefono
 * @property $celular
 * @property $dependencia
 * @property $nivel
 * @property $turno
 * @property $departamento
 * @property $provincia
 * @property $municipio
 * @property $distrito
 * @property $areageografica
 * @property $coordenadax
 * @property $coordenaday
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Colegio extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','rue','director','direccion','telefono','celular','dependencia','nivel','turno','departamento_id','provincia_id','municipio_id','distrito','areageografica','coordenadax','coordenaday'];
    
    public function estudiantes(){

       return  $this->belongsToMany(Estudiante::class);
    }

    
    


}
