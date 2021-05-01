<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDocenteInscripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_inscripcione', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('inscripcione_id');

            $table->foreign('docente_id', 'fk_docente_inscripciones')->references('id')->on('docentes');
            $table->foreign('inscripcione_id','fk_doncete_inscripciones1')->references('id')->on('inscripciones');
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
        Schema::dropIfExists('docente_inscripcione');
    }
}
