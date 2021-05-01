<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiable', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('materiable_id');
            $table->string('tameriable_type');

            $table->unsignedInteger('materia_id');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

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
        Schema::dropIfExists('materiable');
    }
}
