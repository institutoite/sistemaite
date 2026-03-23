<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePagosPrecisionAndIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->decimal('monto', 10, 2)->change();
            $table->decimal('pagocon', 10, 2)->change();
            $table->decimal('cambio', 10, 2)->change();

            $table->index(['pagable_type', 'pagable_id'], 'pagos_pagable_type_pagable_id_index');
            $table->index('created_at', 'pagos_created_at_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropIndex('pagos_pagable_type_pagable_id_index');
            $table->dropIndex('pagos_created_at_index');

            $table->decimal('monto', 6, 2)->change();
            $table->decimal('pagocon', 6, 2)->change();
            $table->decimal('cambio', 6, 2)->change();
        });
    }
}

