<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialBusqueda extends Model
{
    protected $table = 'historial_busquedas';
    protected $fillable = ['user_id', 'termino', 'ip'];
    // Relación con usuario
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
