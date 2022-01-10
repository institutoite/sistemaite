<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipomotivo;

class TipomotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipomotivo::create(['tipomotivo' => "motivo de inscripcion"]);
        Tipomotivo::create(['tipomotivo' => "Tipo motivo de lincencia computacion"]);
        Tipomotivo::create(['tipomotivo' => "Tipo motivo de licencia profesor"]);
    }
}
