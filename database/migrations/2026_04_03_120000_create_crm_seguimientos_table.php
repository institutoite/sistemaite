<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->string('accion', 30);
            $table->string('canal', 20)->nullable();
            $table->string('motivo', 160)->nullable();
            $table->string('mensaje_sugerido', 600)->nullable();
            $table->date('proximo_contacto')->nullable();
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('set null');

            $table->index(['persona_id', 'created_at'], 'idx_crm_seg_persona_created');
            $table->index(['accion', 'created_at'], 'idx_crm_seg_accion_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crm_seguimientos');
    }
}

