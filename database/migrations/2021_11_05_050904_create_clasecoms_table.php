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
            $table->id();
            $table->date('fecha');


            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_clasecom_estado_id')
                ->references('id')->on('estados');
            
            $table->time('horainicio');
            $table->time('horafin');

            $table->unsignedBigInteger('docente_id')->nullable();
            $table->unsignedBigInteger('aula_id')->nullable();
            $table->unsignedBigInteger('programacioncom_id');
            
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
