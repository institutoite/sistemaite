<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargo', 20);
            $table->string('fechaingreso', 20);
            $table->tinyInteger('diasprueba');
            $table->boolean('estado');
            $table->double('sueldo');
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id', 'fk_persona_administrativo')
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
        Schema::dropIfExists('administrativos');
    }
}
