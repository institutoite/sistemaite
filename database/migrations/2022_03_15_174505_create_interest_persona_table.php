<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestPersonaTable extends Migration
{

    

    public function up()
    {
        Schema::create('interest_persona', function (Blueprint $table) {
            $table->unsignedBigInteger('interest_id');
            $table->foreign('interest_id')->references('id')->on('interests');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interest_persona');
    }
}