<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class BackfillCostoUnitarioInDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'UPDATE detalle_ventas dv
             INNER JOIN productos p ON p.id = dv.producto_id
             SET dv.costo_unitario = p.costo
             WHERE (dv.costo_unitario IS NULL OR dv.costo_unitario <= 0)
               AND p.costo > 0'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No-op: no se revierte para evitar perdida de trazabilidad historica.
    }
}
