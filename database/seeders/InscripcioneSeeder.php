<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Inscripcione;;

class InscripcioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscripcione::create([
            'horainicio'=>'14:00:00',
            'horafin'=>'15:00:00',
            'fechaini'=>'2021-05-01',
            'fechafin'=>'2021-05-28',
            'totalhoras'=>'20',
            'costo'=>'420',
            'horasxclase'=>'1',
            'vigente'=>1,
            'condonado'=>0,
            'objetivo'=>'Superar suma resta y multiplicacion',
            'lunes'=>1,
            'martes'=>1,
            'miercoles'=>1,
            'jueves'=>0,
            'viernes'=>1,
            'sabado'=>1,
            'estudiante_id'=>1,
            'modalidad_id'=>4,
            'motivo_id' => 1,
            
        ]);
        Inscripcione::create([
            'horainicio' => '15:00:00',
            'horafin' => '16:00:00',
            'fechaini' => '2021-05-01',
            'fechafin' => '2021-05-28',
            'totalhoras' => '20',
            'costo' => '420',
            'horasxclase' => '1',
            'vigente' => 1,
            'condonado' => 0,
            'objetivo' => 'Aprender ingles tiene un examen',
            'lunes' => 1,
            'martes' => 1,
            'miercoles' => 1,
            'jueves' => 0,
            'viernes' => 1,
            'sabado' => 1,
            'estudiante_id' => 1,
            'modalidad_id' => 4,
            'motivo_id' => 1,

        ]);
    }
}
