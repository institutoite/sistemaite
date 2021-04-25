<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncripcioncolegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incripcioncolegios', function (Blueprint $table) {
            $table->increments('id');
            $table->time('horainicio')->nullable();
            $table->time('horafin')->nullable();
            $table->date('fechaini')->nullable();
            $table->date('fechafin')->nullable();
            $table->decimal('totalhoras', 6, 2)->nullable();
            $table->decimal('horasxclase', 4, 2)->nullable();
            $table->tinyInteger('vigente')->nullable();
            $table->tinyInteger('condonado')->nullable();
            $table->string('Objetivo', 300)->nullable();
            $table->tinyInteger('lunes')->nullable();
            $table->tinyInteger('martes')->nullable();
            $table->tinyInteger('miercoles')->nullable();
            $table->tinyInteger('jueves')->nullable();
            $table->tinyInteger('viernes')->nullable();
            $table->tinyInteger('sabado')->nullable();

            $table->integer('estudiante_id');
            $table->unsignedInteger('modalidad_id');

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
        Schema::dropIfExists('incripcioncolegios');
    }
}
