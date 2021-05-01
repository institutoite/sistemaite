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
            $table->increments('id');
            $table->string('observacion', 500);
            $table->date('fecha_ingreso');
            $table->tinyInteger('diasprueba');
            $table->decimal('sueldo', 6, 2)->nullable();
            $table->tinyInteger('estado')->nullable();
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id', 'fk_docente_persona_idx')
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
