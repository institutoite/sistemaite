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
            $table->increments('id');

            $table->unsignedInteger('computacion_id');
            $table->foreign('computacion_id')
                ->references('id')
                ->on('computacions');

            $table->unsignedInteger('asignatura_id');
            $table->foreign('asignatura_id')
                ->references('id')
                ->on('asignaturas');

            $table->date('fechaini');
            $table->date('fechafin');
            $table->date('fecha_proximo_pago')->nullable(); 
            $table->decimal('costo', 8, 2);
            $table->decimal('totalhoras', 6, 2);
            $table->boolean('vigente');
            $table->boolean('condonado');
            $table->string('objetivo');
            $table->unsignedInteger('motivo_id');
            $table->foreign('motivo_id', 'fk_matriculacion_motivos_idx')
            ->references('id')->on('motivos');
            
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
