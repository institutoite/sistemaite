<?php

namespace App\Models;

use App\Docente;
use App\Materia;
use App\Tema;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase
 *
 * @property $id
 * @property $fecha
 * @property $pagado
 * @property $estado
 * @property $horainicio
 * @property $horafin
 * @property $docente_id
 * @property $materia_id
 * @property $aula_id
 * @property $tema_id
 * @property $programacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Aula $aula
 * @property Docente $docente
 * @property Glosa[] $glosas
 * @property Materia $materia
 * @property Programacion $programacion
 * @property Tema $tema
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clase extends Model
{
    
    static $rules = [
		'fecha' => 'required',
		'pagado' => 'required',
		'estado' => 'required',
		'programacion_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha','pagado','estado','horainicio','horafin','docente_id','materia_id','aula_id','tema_id','programacion_id', 'created_at', 'updated_at',];

    protected $dates = ['fecha', 'horainicio', 'horafin', 'created_at', 'updated_at',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aula()
    {
        return $this->hasOne(Aula::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne(Docente::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function glosas()
    {
        return $this->hasMany(Glosa::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne(Materia::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function programacion()
    {
        return $this->hasOne(Programacion::class);
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tema()
    {
        return $this->hasOne(Tema::class);
    }
    /**
     * ok
     */
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }
    

}
