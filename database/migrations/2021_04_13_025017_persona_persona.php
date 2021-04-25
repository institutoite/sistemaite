<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonaPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telefono', 10)->nullable();
            $table->string('parentesco', 10)->nullable();
            $table->unsignedInteger('persona_id');
            $table->unsignedInteger('persona_id_apoderado');

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('persona_id_apoderado')->references('id')->on('personas');

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
        //
    }
}
