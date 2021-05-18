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
        Feriado::create(['fecha'=>'2021-05-27','festividad'=>'DIA DE LA MADRE']);
        Feriado::create(['fecha'=>'2021-05-30','festividad'=>'DIA DE LA TORTUGA']);
        Feriado::create(['fecha'=>'2021-08-06','festividad'=>'DIA DE LA PATRIA']);
        Feriado::create(['fecha'=>'2021-09-24','festividad'=>'DIA DE SANTA CRUZ']);
        Feriado::create(['fecha'=>'2021-11-02','festividad'=>'DIA DE LOS MUERTOS']);
        Feriado::create(['fecha'=>'2021-12-25','festividad'=>'NAVIDAD']);
        
    }
}
