<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->boolean('habilitado');
            $table->boolean('activo');
            $table->string('estado', 25);
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table->double('horas_por_clase');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('materia_id');
            $table->unsignedInteger('aula_id');
            $table->unsignedInteger('inscripcione_id');

            $table->foreign('docente_id', 'fk_programacion_docente_idx')
                ->references('id')->on('docentes');

            $table->foreign('materia_id', 'fk_programacion_materia_idx')
            ->references('id')->on('materias');

            $table->foreign('aula_id', 'fk_programacion_aula_idx')
            ->references('id')->on('aulas');

            $table->foreign('inscripcione_id', 'fk_programacion_inscripcion_idx')
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
        Schema::dropIfExists('programacions');
    }
}
