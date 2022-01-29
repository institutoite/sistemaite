<?php

namespace Database\Seeders;

use App\Models\Feriado;
use Illuminate\Database\Seeder;

class FeriadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feriado::create(['fecha'=>'2021-02-28','festividad'=>'Carnaval']);
        Feriado::create(['fecha'=>'2021-03-01','festividad'=>'Carnaval']);
        Feriado::create(['fecha'=>'2021-05-02','festividad'=>'Feriado del Día del Trabajo']);
        Feriado::create(['fecha'=>'2021-08-06','festividad'=>'Día de la Independencia']);
        Feriado::create(['fecha'=>'2021-11-02','festividad'=>'Día de Todos los Difuntos']);
        Feriado::create(['fecha'=>'2021-12-26','festividad'=>'Feriado de Navidad']);
        
    }
}
