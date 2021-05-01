<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aula_id');
            $table->unsignedInteger('inscripcione_id');

            $table->foreign('aula_id','fk_aula_inscripciones')->references('id')->on('aulas');
            $table->foreign('inscripcione_id')->references('id')->on('inscripciones');
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
        Schema::dropIfExists('aula_inscripciones');
    }
}
