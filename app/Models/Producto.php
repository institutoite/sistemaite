<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'codigo',
        'codigo_qr',
        'codigo_barras',
        'precio',
        'stock',
        'activo',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'activo' => 'boolean',
    ];

    public function detallesVenta()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
