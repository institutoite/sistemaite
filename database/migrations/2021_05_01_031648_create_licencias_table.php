<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('motivo_id');
            $table->foreign('motivo_id')
                ->references('id')
                ->on('motivos')->delete('cascade');

            $table->string('solicitante', 45);
            $table->string('parentesco', 45);
            $table->unsignedBigInteger('licenciable_id');
            $table->string('licenciable_type',50);
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
        Schema::dropIfExists('licencias');
    }
}
