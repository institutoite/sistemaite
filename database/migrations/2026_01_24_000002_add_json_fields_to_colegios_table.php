<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJsonFieldsToColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colegios', function (Blueprint $table) {
            $table->string('humanistico', 50)->nullable()->after('turno');
            $table->string('url', 255)->nullable()->after('coordenaday');
            $table->decimal('latitud', 10, 7)->nullable()->after('coordenadax');
            $table->decimal('longitud', 10, 7)->nullable()->after('latitud');
            $table->string('coordenadas_texto', 120)->nullable()->after('longitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colegios', function (Blueprint $table) {
            $table->dropColumn(['humanistico', 'url', 'latitud', 'longitud', 'coordenadas_texto']);
        });
    }
}
