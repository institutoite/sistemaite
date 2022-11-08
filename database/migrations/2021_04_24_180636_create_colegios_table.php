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
            $table->string('director', 75)->nullable();
            $table->string('imagen', 75)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 25)->nullable();
            $table->string('celular', 10)->nullable();
            $table->boolean('convenio')->default(0);
            $table->string('dependencia', 15)->nullable();
            $table->string('nivel', 40)->nullable();
            $table->string('turno', 15)->nullable();
            $table->string('departamento',25);
            $table->string('provincia',25);
            $table->string('municipio',35);
            $table->string('distrito', 20)->nullable();
            $table->string('areageografica', 20)->nullable();
            $table->string('coordenadax', 20)->nullable();
            $table->string('coordenaday', 20)->nullable();
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
