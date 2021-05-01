<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInscripcionesMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcione_materia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inscripcione_id');
            $table->unsignedInteger('materia_id');

            $table->foreign('inscripcione_id', 'fk_inscripcione_materia')->references('id')->on('inscripciones');
            $table->foreign('materia_id', 'fk_inscripcione_materia1')->references('id')->on('materias');
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
        Schema::dropIfExists('inscripcione_materia');
    }
}
