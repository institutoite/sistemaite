<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',25);
            $table->date('fecha_ingreso');
            $table->tinyInteger('dias_prueba');
            $table->decimal('sueldo', 6, 2)->nullable();
            $table->tinyInteger('presencial')->default(1);
            
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')->on('estados');

            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')
                ->references('id')->on('personas');
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
        Schema::dropIfExists('docentes');
    }
}
