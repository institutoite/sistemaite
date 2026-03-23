<?php

use Illuminate\Database\Migrations\Migration;

class AddNombreNormalizadoUniqueToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Validacion por request solicitada por usuario. Esta migracion queda sin efecto.
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // No-op.
    }
}
