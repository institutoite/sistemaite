<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('motivo', 80);
            $table->string('solicitante', 45);
            $table->string('parentesco', 45);
            $table->unsignedInteger('programacion_id');
            $table->foreign('programacion_id', 'fk_programacion_licencia_idx')
            ->references('id')->on('programacions');
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
        Schema::dropIfExists('licencias');
    }
}
