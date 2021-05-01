<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
           
            $table->time('horainicio')->nullable();
            $table->time('horafin')->nullable();
            $table->date('fechaini');
            $table->date('fechafin');
            $table->decimal('totalhoras', 6, 2);
            $table->decimal('horasxclase', 4, 2);
            $table->boolean('vigente');
            
            $table->boolean('condonado');
            $table->string('Objetivo');
            $table->boolean('lunes')->nullable();
            $table->boolean('martes')->nullable();
            $table->boolean('miercoles')->nullable();
            $table->boolean('jueves')->nullable();
            $table->boolean('viernes')->nullable();
            $table->boolean('sabado')->nullable();

            $table->unsignedInteger('estudiante_id');
            $table->unsignedInteger('modalidad_id');

            $table->foreign('estudiante_id', 'fk_inscripcion_estudiante1x_idx')
                ->references('id')->on('estudiantes');

            $table->foreign('modalidad_id', 'fk_inscripciones_modalidades_idx')
                ->references('id')->on('modalidads');
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
        Schema::dropIfExists('inscripciones');
    }
}
