<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialBusqueda extends Model
{
    protected $table = 'historial_busquedas';
    protected $fillable = ['user_id', 'termino', 'ip'];
}
