<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80)->nullable();
            $table->string('rue', 10)->nullable();
            $table->string('director', 50)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('celular', 10)->nullable();
            $table->string('dependencia', 15)->nullable();
            $table->string('nivel', 20)->nullable();
            $table->string('turno', 15)->nullable();
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('municipio_id');
            $table->string('distrito', 20)->nullable();
            $table->string('areageografica', 20)->nullable();
            $table->string('coordenadax', 15)->nullable();
            $table->string('coordenaday', 15)->nullable();

            $table->foreign('departamento_id', 'fk_colegio_departamento_idx')
            ->references('id')->on('departamentos');

            $table->foreign('provincia_id', 'fk_colegio_provincia_idx')
            ->references('id')->on('provincias');

            $table->foreign('municipio_id', 'fk_colegio_municipio_idx')
            ->references('id')->on('municipios');
            
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
        Schema::dropIfExists('colegios');
    }
}
