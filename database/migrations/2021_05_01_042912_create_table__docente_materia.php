<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDocenteMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_materia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('materia_id');

            $table->foreign('docente_id', 'fk_docente_materia')->references('id')->on('docentes');
            $table->foreign('materia_id', 'fk_doncete_materia1')->references('id')->on('materias');
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
        Schema::dropIfExists('docente_materia');
    }
}
