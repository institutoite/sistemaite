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
            $table->id();
            $table->date('fecha');
            $table->boolean('habilitado');
            $table->boolean('activo');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_programacioncom_estado_id')
                ->references('id')->on('estados');
            
                $table->time('horaini');
            $table->time('horafin');
            $table->double('horas_por_clase');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('aula_id');
            $table->unsignedBigInteger('matriculacion_id');

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
