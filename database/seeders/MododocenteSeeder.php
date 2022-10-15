<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mododocente;
class MododocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mododocente::create(['mododocente'=>'PRESENCIAL']);
        Mododocente::create(['mododocente'=>'VIRTUAL']);
        Mododocente::create(['mododocente'=>'SOLOPRACTICOS']);
        Mododocente::create(['mododocente'=>'SOLO RESERVAS']);
        Mododocente::create(['mododocente'=>'DISTANCIA']);

        // ok userables
    }
}
