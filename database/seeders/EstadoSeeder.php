<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create(['estado'=>'INDEFINIDO']);
        Estado::create(['estado'=>'PRESENTE']);
        Estado::create(['estado'=>'FALTA']);
        Estado::create(['estado'=>'CONGELADO']);
        Estado::create(['estado'=>'LICENCIA']);
        Estado::create(['estado'=>'FINALIZADO']);
        Estado::create(['estado'=>'RESERVADO']);
        Estado::create(['estado'=>'CORRIENDO']);
        Estado::create(['estado'=>'DESVIGENTE']);
        
    }
}
