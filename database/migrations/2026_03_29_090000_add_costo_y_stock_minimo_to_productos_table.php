<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostoYStockMinimoToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            if (!Schema::hasColumn('productos', 'costo')) {
                $table->decimal('costo', 10, 2)->default(0)->after('codigo_barras');
            }

            if (!Schema::hasColumn('productos', 'stock_minimo')) {
                $table->unsignedInteger('stock_minimo')->default(5)->after('stock');
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
        Schema::table('productos', function (Blueprint $table) {
            if (Schema::hasColumn('productos', 'stock_minimo')) {
                $table->dropColumn('stock_minimo');
            }

            if (Schema::hasColumn('productos', 'costo')) {
                $table->dropColumn('costo');
            }
        });
    }
}
