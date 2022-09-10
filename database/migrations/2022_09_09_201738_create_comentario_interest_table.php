<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioInterestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_interest', function (Blueprint $table) {
            $table->unsignedBigInteger('interest_id');
            $table->foreign('interest_id')->references('id')->on('interests');
            $table->unsignedBigInteger('comentario_id');
            $table->foreign('comentario_id')->references('id')->on('comentarios');
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
        Schema::table('comentario_interest', function (Blueprint $table) {
            //
        });
    }
}
