<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('billete_id');
            $table->unsignedBigInteger('billetable_id');
            $table->string('billetable_type', 30);
            $table->tinyInteger('cantidad');
            $table->string('tipo',10);
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
        Schema::dropIfExists('billetables');
    }
}
