<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaini');
            $table->date('fechafin');
            $table->date('fecha_proximo_pago')->nullable(); 
            $table->decimal('costo', 8, 2);
            $table->decimal('totalhoras', 6, 2);
            $table->boolean('vigente');
            $table->boolean('condonado');
            $table->string('objetivo');
            $table->unsignedInteger('estudiante_id');
            $table->unsignedInteger('modalidad_id');
            $table->unsignedInteger('motivo_id');

            $table->foreign('motivo_id', 'fk_inscripcion_motivos_idx')
            ->references('id')->on('motivos')->onDelete('cascade');

            $table->foreign('estudiante_id', 'fk_inscripcion_estudiante1x_idx')
                ->references('id')->on('estudiantes')->onDelete('cascade');

            $table->foreign('modalidad_id', 'fk_inscripciones_modalidades_idx')
                ->references('id')->on('modalidads')->onDelete('cascade');
                
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
        Schema::dropIfExists('inscripciones');
    }
}
