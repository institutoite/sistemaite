<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacioncomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacioncoms', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->boolean('habilitado');
            $table->boolean('activo');
            $table->string('estado', 25);
            $table->time('horaini');
            $table->time('horafin');
            $table->double('horas_por_clase');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('aula_id');
            $table->unsignedInteger('matriculacion_id');

            $table->foreign('docente_id', 'fk_programacioncom_docente_idx')
                ->references('id')->on('docentes');
            $table->foreign('aula_id', 'fk_programacioncom_aula_idx')
            ->references('id')->on('aulas');
            $table->foreign('matriculacion_id', 'fk_programacioncom_matriculacion')
            ->references('id')->on('matriculacions');
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
        Schema::dropIfExists('programacioncoms');
    }
}