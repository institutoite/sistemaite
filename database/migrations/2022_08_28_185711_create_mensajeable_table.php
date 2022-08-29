<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajeableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajeables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mensajeable_id');
            $table->string('mensajeable_type',32);
            $table->unsignedBigInteger('mensaje_id');
            $table->foreign('mensaje_id')->references('id')->on('mensajes');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
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
        Schema::dropIfExists('mensajeables');
    }
}
