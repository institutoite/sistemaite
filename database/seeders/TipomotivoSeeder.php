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
        Tipomotivo::create(['tipomotivo' => "motivo de inscripción"]);
        Tipomotivo::create(['tipomotivo' => "motivo de matriculacion computación"]);
        Tipomotivo::create(['tipomotivo' => "motivo de Inscripcion Guardería"]);
        Tipomotivo::create(['tipomotivo' => "Tipo motivo de lincencia Clases Nivelvación"]);
        Tipomotivo::create(['tipomotivo' => "Tipo motivo de licencia clases computación"]);
        Tipomotivo::create(['tipomotivo' => "Tipo motivo de licencia Guardería"]);

        Tipomotivo::find(1)->usuarios()->attach(1);
        Tipomotivo::find(2)->usuarios()->attach(1);
        Tipomotivo::find(3)->usuarios()->attach(1);

        Tipomotivo::find(4)->usuarios()->attach(1);
        Tipomotivo::find(5)->usuarios()->attach(1);
        Tipomotivo::find(6)->usuarios()->attach(1);

    }
}
