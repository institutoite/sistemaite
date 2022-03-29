<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliservicios', function (Blueprint $table) {
            $table->id();
            $table->string('requerimiento', 500);

            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id', 'fk_persona_cliservicio')
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
        Schema::dropIfExists('cliservicios');
    }
}
