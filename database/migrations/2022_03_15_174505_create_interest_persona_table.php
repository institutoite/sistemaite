<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestPersonaTable extends Migration
{

    

    public function up()
    {
        Schema::create('interest_persona', function (Blueprint $table) {
            
            $table->unsignedInteger('interest_id');
            $table->integer('persona_id')->unsigned();
            $table->foreign('interest_id')->references('id')->on('interests');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interest_persona');
    }
}