<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputacionCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computacion_carrera', function (Blueprint $table) {
            $table->unsignedInteger('computacion_id');
            $table->foreign('computacion_id')
                ->references('id')
                ->on('computacions');
            $table->unsignedInteger('carrera_id');
            $table->foreign('carrera_id')
                ->references('id')
                ->on('carreras');
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
        Schema::dropIfExists('computacion_carrera');
    }
}
