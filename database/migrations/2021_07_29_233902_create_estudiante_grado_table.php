<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteGradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_grado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->foreign('estudiante_id')
                ->references('id')
                ->on('estudiantes');
            $table->unsignedBigInteger('grado_id');
            $table->foreign('grado_id')
                ->references('id')
                ->on('grados');
            $table->unsignedBigInteger('colegio_id');
            $table->foreign('colegio_id')
                ->references('id')
                ->on('colegios');
            $table->string('anio',5)->nullable();
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
        Schema::table('estudiante_grado', function (Blueprint $table) {
            //
        });
    }
}
