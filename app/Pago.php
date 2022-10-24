<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    //*** copiar esto a todos los modelos que tengan pagos  */
    public function pagos()
    {
        return $this->morphMany(Pago::class, 'pagable');
    }
    public function periodable()
    {
        return $this->morphMany(Periodable::class, 'periodable');
    }
}
