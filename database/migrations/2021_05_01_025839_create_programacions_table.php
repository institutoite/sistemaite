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
            $table->id();
            $table->date('fecha');
            $table->boolean('habilitado');
            $table->boolean('activo');
            
            $table->time('hora_ini');
            $table->time('hora_fin');
            $table->double('horas_por_clase');
            
             
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('aula_id');
            $table->unsignedBigInteger('inscripcione_id');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_programacion_estado_id')
                ->references('id')->on('estados');
            
                $table->foreign('docente_id', 'fk_programacion_docente_idx')
                ->references('id')->on('docentes')->onDelete('cascade');

            $table->foreign('materia_id', 'fk_programacion_materia_idx')
            ->references('id')->on('materias')->onDelete('cascade');

            $table->foreign('aula_id', 'fk_programacion_aula_idx')
            ->references('id')->on('aulas')->onDelete('cascade');

            $table->foreign('inscripcione_id', 'fk_programacion_inscripcion_idx')
            ->references('id')->on('inscripciones')->onDelete('cascade');

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
