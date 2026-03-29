<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostoUnitarioToDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_ventas', function (Blueprint $table) {
            if (!Schema::hasColumn('detalle_ventas', 'costo_unitario')) {
                $table->decimal('costo_unitario', 10, 2)->default(0)->after('precio_unitario');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_ventas', function (Blueprint $table) {
            if (Schema::hasColumn('detalle_ventas', 'costo_unitario')) {
                $table->dropColumn('costo_unitario');
            }
        });
    }
}
