<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->boolean('estado');
            
            $table->boolean('horainicio')->nullable();
            $table->boolean('horafin')->nullable();

            $table->unsignedInteger('docente_id')->nullable();
            $table->unsignedInteger('materia_id')->nullable();
            $table->unsignedInteger('aula_id')->nullable();
            $table->unsignedInteger('tema_id')->nullable();
            $table->unsignedInteger('programacion_id');
            
            $table->foreign('docente_id', 'fk_clases_docentex_idx')
            ->references('id')->on('docentes');

            $table->foreign('materia_id', 'fk_clases_materiax_idx')
            ->references('id')->on('materias');

            $table->foreign('aula_id', 'fkx_clases_aulx_idx')
            ->references('id')->on('aulas');

            $table->foreign('tema_id','fkx_clases_tema_idx')
            ->references('id')->on('temas');

            $table->foreign('programacion_id', 'fk_clase_programacion_idx')
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
        Schema::dropIfExists('clases');
    }
}
