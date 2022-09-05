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
            $table->id();
            $table->date('fecha');
            
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_clase_estado_id')
                ->references('id')->on('estados');

            $table->time('horainicio');
            $table->time('horafin');

            $table->unsignedBigInteger('docente_id')->nullable();
            $table->unsignedBigInteger('materia_id')->nullable();
            $table->unsignedBigInteger('aula_id')->nullable();
            $table->unsignedBigInteger('tema_id')->nullable();
            $table->unsignedBigInteger('programacion_id');
            
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
