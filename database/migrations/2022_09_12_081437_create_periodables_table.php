<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periodable_id');
            $table->string('periodable_type',50);
            $table->date('fechaini');
            $table->date('fechafin');
            $table->boolean('pagado')->default(0);
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
        Schema::dropIfExists('periodables');
    }
}
