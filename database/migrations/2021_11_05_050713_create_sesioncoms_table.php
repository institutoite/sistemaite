<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesioncomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesioncoms', function (Blueprint $table) {
            $table->id();
            $table->time('horainicio');
            $table->time('horafin');
            $table->unsignedBigInteger('matriculacion_id');
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('aula_id');

            $table->foreign('matriculacion_id','fk_matriculacion_sesioncom')->references('id')->on('matriculacions');
            $table->foreign('dia_id','fk_dia_seseoncom')->references('id')->on('dias');
            $table->foreign('docente_id','fk_docente_sesioncom')->references('id')->on('docentes');
            $table->foreign('aula_id','fk_aula_sesioncom')->references('id')->on('aulas');
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
        Schema::dropIfExists('sesioncoms');
    }
}
