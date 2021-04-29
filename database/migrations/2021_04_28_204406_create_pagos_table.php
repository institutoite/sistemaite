<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monto', 6, 2);
            $table->decimal('pagocon', 6, 2);
            $table->decimal('cambio', 6, 2);
            $table->unsignedInteger('inscripcione_id');
            $table->foreign('inscripcione_id', 'fk_inscripciones_pagos_idx')
            ->references('id')->on('inscripciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
