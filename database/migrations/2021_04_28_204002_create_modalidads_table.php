<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modalidad','50');
            $table->decimal('costo', 6, 2);
            $table->double('cargahoraria',15, 8);

            $table->unsignedInteger('nivel_id');
            $table->foreign('nivel_id', 'fk_nivel_modalidad_idx')
            ->references('id')->on('nivels');

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
        Schema::dropIfExists('modalidads');
    }
}
