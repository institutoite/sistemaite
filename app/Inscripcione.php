<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inscripcione
 *
 * @property $id
 * @property $horainicio
 * @property $horafin
 * @property $fechaini
 * @property $fechafin
 * @property $totalhoras
 * @property $horasxclase
 * @property $vigente
 * @property $condonado
 * @property $Objetivo
 * @property $lunes
 * @property $martes
 * @property $miercoles
 * @property $jueves
 * @property $viernes
 * @property $sabado
 * @property $estudiante_id
 * @property $modalidad_id
 * @property $created_at
 * @property $updated_at
 *
 * @property AulaInscripcione[] $aulaInscripciones
 * @property DocenteInscripcione[] $docenteInscripciones
 * @property Estudiante $estudiante
 * @property Modalidad $modalidad
 * @property Programacion[] $programacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inscripcione extends Model
{
    
    static $rules = [
        'horainicio'=>'required',
        'horafin' => 'required',
		'fechaini' => 'required',
		'fechafin' => 'required',
		'totalhoras' => 'required',
		'horasxclase' => 'required',
		'objetivo' => 'required',
		'estudiante_id' => 'required',
		'modalidad_id' => 'required',
        'motivo_id' => 'required',
        
    ];

    protected $perPage = 20;

    protected $dates = [
        'horainicio','horafin','fechaini','fechafin', 'created_at', 'updated_at',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['horainicio','horafin','fechaini','fechafin','totalhoras','horasxclase','vigente','condonado','objetivo','lunes','martes','miercoles','jueves','viernes','sabado','estudiante_id','modalidad_id', 'motivo_id'];

    public function aulas()
    {
        return $this->belongsToMany(Aula::class);
    }
    
    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }
    
    
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function modalidad()
    {
        return $this->hasOne(Modalidad::class);
    }

    public function programaciones()
    {
        return $this->hasMany(Programacion::class);
    }

    //*** copiar esto a todos los modelos que tengan observaciones  */
    public function observaciones()
    {
        return $this->morphMany(Observacion::class, 'observable');
    }

    //*** copiar esto a todos los modelos que tengan observaciones  */
    public function pagos()
    {
        return $this->morphMany(Pago::class, 'pagable');
    }
    
    /** RELACION MUCHOS A MUCHO POLIMORFICO */
    public function materias()
    {
        return $this->morphToMany('App\Materia', 'materiable');
    }

    

}
