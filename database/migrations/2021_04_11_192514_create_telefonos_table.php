<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->string('telefono', 10)->nullable();
            $table->string('parentesco', 10)->nullable();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('persona_id_parentesco');

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('persona_id_parentesco')->references('id')->on('personas');

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
        Schema::dropIfExists('telefonos');
    }
}
