<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidop', 25)->nullable();
            $table->string('apellidom', 25)->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('direccion', 120)->nullable()->default("N/S");
            $table->string('carnet', 10)->nullable();
            $table->string('expedido', 10)->nullable();
            $table->string('genero', 6)->nullable()->default("N/S");
            
            $table->string('foto', 120)->nullable();
            $table->string('papelinicial', 20);
            $table->string('telefono', 10)->nullable()->default(0);
            $table->tinyInteger('votos')->nullable()->unsigned()->default(1);
            $table->tinyInteger('volvera')->unsigned()->default(0);// grado de que va volver a ser activo 
            $table->date('vuelvefecha')->nullable();// fecha que dice que va volver 
            $table->string('empresa',25)->nullable();// fecha que dice que va volver 
            $table->boolean('habilitado')->nullable()->default(0);
            $table->unsignedBigInteger('persona_id')->nullable();// persona que referenció
            $table->unsignedBigInteger('pais_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('zona_id')->nullable();
            $table->unsignedBigInteger('como_id')->nullable();
            
            $table->foreign('persona_id', 'fk_persona_persona1_idx')
            ->references('id')->on('personas');
            
            $table->foreign('pais_id', 'fk_persona_pais_idx')
            ->references('id')->on('pais');

            $table->foreign('ciudad_id', 'fk_persona_ciudad_idx')
            ->references('id')->on('ciudads');
            
            $table->foreign('zona_id', 'fk_persona_zona_idx')
            ->references('id')->on('zonas');

            $table->foreign('como_id', 'fk_persona_como_idx')
            ->references('id')->on('comos');

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
        Schema::dropIfExists('personas');
    }
}
