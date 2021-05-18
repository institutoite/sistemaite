<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billetes', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('billete200')->nullable();
            $table->tinyInteger('billete100')->nullable();
            $table->tinyInteger('billete50')->nullable();
            $table->tinyInteger('billete20')->nullable();
            $table->tinyInteger('billete10')->nullable();
            $table->tinyInteger('moneda5')->nullable();
            $table->tinyInteger('moneda2')->nullable();
            $table->tinyInteger('moneda1')->nullable();
            $table->tinyInteger('moneda50')->nullable();
            $table->tinyInteger('moneda20')->nullable();
            $table->tinyInteger('moneda10')->nullable();
            $table->string('tipo');
            $table->integer('pago_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos');


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
        Schema::dropIfExists('billetes');
    }
}
