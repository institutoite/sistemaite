<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasecomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasecoms', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('estado',15);
            $table->time('horainicio');
            $table->time('horafin');

            $table->unsignedInteger('docente_id')->nullable();
            $table->unsignedInteger('aula_id')->nullable();
            $table->unsignedInteger('programacioncom_id');
            
            $table->foreign('docente_id')
            ->references('id')->on('docentes');

            $table->foreign('aula_id')
            ->references('id')->on('aulas');

            $table->foreign('programacioncom_id')
                ->references('id')->on('programacioncoms');
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
        Schema::dropIfExists('clasecoms');
    }
}
