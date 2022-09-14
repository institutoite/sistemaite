<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecorto',25);
            $table->date('fecha_inicio');
            $table->date('fechapago')->nullable();
            $table->tinyInteger('dias_prueba');
            $table->decimal('sueldo', 6, 2)->nullable();
            $table->string('perfil', 500)->nullable();
            
            $table->unsignedBigInteger('mododocente_id');
            $table->foreign('mododocente_id')
                ->references('id')->on('mododocentes');
                
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')->on('estados');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')
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
        Schema::dropIfExists('docentes');
    }
}
