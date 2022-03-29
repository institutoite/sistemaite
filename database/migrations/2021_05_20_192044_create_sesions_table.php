<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();
            $table->time('horainicio');
            $table->time('horafin');
            $table->unsignedBigInteger('inscripcione_id');
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('aula_id');

            $table->foreign('inscripcione_id','fk_inscripcione_sesion')->references('id')->on('inscripciones')->onDelete('cascade');
            $table->foreign('dia_id','fk_dia_sesion')->references('id')->on('dias');
            $table->foreign('docente_id','fk_docente_sesion')->references('id')->on('docentes');
            $table->foreign('materia_id','fk_materia_sesion')->references('id')->on('materias');
            $table->foreign('aula_id','fk_aula_sesion')->references('id')->on('aulas');

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
        Schema::dropIfExists('sesions');
    }
}
