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
            $table->string('estado',15);
            $table->time('horainicio');
            $table->time('horafin');

            $table->unsignedInteger('docente_id')->nullable();
            $table->unsignedInteger('materia_id')->nullable();
            $table->unsignedInteger('aula_id')->nullable();
            $table->unsignedInteger('tema_id')->nullable();
            $table->unsignedInteger('programacion_id');
            
            $table->foreign('docente_id')
            ->references('id')->on('docentes');

            $table->foreign('materia_id')
            ->references('id')->on('materias');

            $table->foreign('aula_id')
            ->references('id')->on('aulas');

            $table->foreign('tema_id')
            ->references('id')->on('temas');

            $table->foreign('programacion_id')
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
