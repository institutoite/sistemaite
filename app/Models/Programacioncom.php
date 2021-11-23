<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacioncom extends Model
{
    use HasFactory;
    protected $dates = ['fecha','horaini','horafin'];

        /* Get the docente associated with the Programacioncom
        *
        * @return \Illuminate\Database\Eloquent\Relations\HasOne
        */
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    /**
     * Get all of the matriculacion for the Programacioncom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    /**
      * Get the user that owns the Programacioncom
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
    public function matriculacion()
    {
        return $this->belongsTo(Matriculacion::class);
    }
    public function aula()
    {
        return $this->belongsTo('App\Models\Aula');
    }
    

}
