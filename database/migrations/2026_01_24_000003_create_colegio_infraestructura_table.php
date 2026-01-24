<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColegioInfraestructuraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegio_infraestructura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colegio_id')->constrained('colegios')->onDelete('cascade');
            $table->string('agua', 20)->nullable();
            $table->string('electricidad', 20)->nullable();
            $table->string('banos', 20)->nullable();
            $table->string('internet', 20)->nullable();
            $table->string('aulas', 20)->nullable();
            $table->string('laboratorios', 20)->nullable();
            $table->string('bibliotecas', 20)->nullable();
            $table->string('computacion', 20)->nullable();
            $table->string('canchas', 20)->nullable();
            $table->string('gimnasios', 20)->nullable();
            $table->string('coliseos', 20)->nullable();
            $table->string('piscinas', 20)->nullable();
            $table->string('secretaria', 20)->nullable();
            $table->string('reuniones', 20)->nullable();
            $table->string('talleres', 20)->nullable();
            $table->timestamps();

            $table->unique('colegio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colegio_infraestructura');
    }
}
