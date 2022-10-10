<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id')->default(1);
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onDelete('cascade');
            $table->unsignedBigInteger('computacion_id');
            $table->foreign('computacion_id')
                ->references('id')
                ->on('computacions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('asignatura_id');
            $table->foreign('asignatura_id')
                ->references('id')
                ->on('asignaturas')
                ->onDelete('cascade');

            $table->unsignedBigInteger('motivo_id');
            $table->foreign('motivo_id', 'fk_matriculacion_motivos_idx')
            ->references('id')
            ->on('motivos')
            ->onDelete('cascade');

            

            $table->date('fechaini');
            $table->date('fechafin');
            $table->date('fecha_proximo_pago')->nullable(); 
            $table->decimal('costo', 8, 2);
            $table->decimal('totalhoras', 6, 2);
            $table->boolean('vigente');
            $table->boolean('condonado');
            $table->tinyInteger('ser')->nullable();
            $table->tinyInteger('hacer')->nullable();
            $table->tinyInteger('saber')->nullable();
            $table->tinyInteger('decidir')->nullable();
            $table->tinyInteger('calificacion')->nullable();
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
        Schema::dropIfExists('matriculacions');
    }
}
