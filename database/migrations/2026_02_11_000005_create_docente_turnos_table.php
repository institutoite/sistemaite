<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('dia_id');
            $table->time('hora_inicio');
            $table->time('hora_fin');

            $table->foreign('docente_id', 'fk_docente_turno_docente')
                ->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('dia_id', 'fk_docente_turno_dia')
                ->references('id')->on('dias');

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
        Schema::dropIfExists('docente_turnos');
    }
}
