<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->string('codigo_qr')->nullable()->unique();
            $table->string('codigo_barras')->nullable()->unique();
            $table->decimal('costo', 10, 2)->default(0);
            $table->decimal('precio', 10, 2);
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('stock_minimo')->default(5);
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('productos');
    }
}
