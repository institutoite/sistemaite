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
            $table->increments('id');
            $table->string('nombre', 40);
            $table->string('apellidop', 25);
            $table->string('apellidom', 25)->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('direccion', 120)->nullable();
            $table->string('carnet', 10)->nullable()->default("0");
            $table->string('expedido', 10)->nullable()->default();
            $table->string('genero', 6);
            
            $table->string('foto', 120)->nullable();
            $table->string('como', 30)->nullable();
            $table->string('papelinicial', 30);
            $table->string('telefono', 10)->nullable();
            
            $table->unsignedInteger('persona_id')->nullable();
            $table->unsignedInteger('pais_id')->nullable();
            $table->unsignedInteger('ciudad_id')->nullable();
            $table->unsignedInteger('zona_id')->nullable();
            $table->unsignedInteger('idantiguo')->nullable()->default(0);
            
            $table->foreign('persona_id', 'fk_persona_persona1_idx')
            ->references('id')->on('personas');
            
            $table->foreign('pais_id', 'fk_persona_pais_idx')
            ->references('id')->on('pais');

            $table->foreign('ciudad_id', 'fk_persona_ciudad_idx')
            ->references('id')->on('ciudads');
            
            $table->foreign('zona_id', 'fk_persona_zona_idx')
            ->references('id')->on('zonas');

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
