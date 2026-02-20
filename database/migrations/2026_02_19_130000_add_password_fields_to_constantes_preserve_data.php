<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Agregar nuevos campos sin eliminar los antiguos
        Schema::table('constantes', function (Blueprint $table) {
            if (!Schema::hasColumn('constantes', 'cuenta')) {
                $table->string('cuenta', 100)->nullable()->after('id');
            }
            if (!Schema::hasColumn('constantes', 'plataforma')) {
                $table->string('plataforma', 100)->nullable()->after('cuenta');
            }
            if (!Schema::hasColumn('constantes', 'clave')) {
                $table->string('clave', 100)->nullable()->after('plataforma');
            }
            if (!Schema::hasColumn('constantes', 'descripcion')) {
                $table->text('descripcion')->nullable()->after('clave');
            }
        });

        // Migrar datos antiguos a los nuevos campos solo si existen
        if (Schema::hasColumn('constantes', 'constante') && Schema::hasColumn('constantes', 'valor')) {
            DB::table('constantes')->update([
                'cuenta' => DB::raw('constante'),
                'clave' => DB::raw('valor')
            ]);
        }
        // NOTA: plataforma y descripcion quedan vacíos para edición manual posterior
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('constantes', function (Blueprint $table) {
            $table->dropColumn(['cuenta', 'plataforma', 'clave', 'descripcion']);
        });
    }
};
