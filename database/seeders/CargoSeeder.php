<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;
class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create(['cargo'=>"SECRETARIA"]);
        Cargo::create(['cargo'=>"AUXILIAR"]);
        Cargo::create(['cargo'=>"LIMPIEZA"]);
        Cargo::create(['cargo'=>"COCINA"]);
    }
}
