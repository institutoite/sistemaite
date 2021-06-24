<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;


class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Docente::create([
            'sueldo'=>2000.00,
            'fecha_ingreso'=>'2000-10-12',
            'nombre'=>'Edgar E',
            'estado'=>'activo',
            'dias_prueba'=>2,
            'persona_id'=>11,
            ]);
        Docente::create([
            'sueldo' => 2000.00,
            'fecha_ingreso' => '1998-10-12',
            'nombre' => 'Cesar C',
            'estado' => 'activo',
            'dias_prueba' => 1,
            'persona_id' => 12,
        ]);
        Docente::create([
            'sueldo' => 1100,
            'fecha_ingreso' => '1998-10-12',
            'nombre' => 'Mailyn R',
            'estado' => 'activo',
            'dias_prueba' => 1,
            'persona_id' => 13,
        ]);
        Docente::create([
            'sueldo' => 1500.00,
            'fecha_ingreso' => '1998-10-12',
            'nombre' => 'Lia C',
            'estado' => 'activo',
            'dias_prueba' => 1,
            'persona_id' => 14,
        ]);
        Docente::create([
            'sueldo' => 1520.00,
            'fecha_ingreso' => '1998-10-12',
            'nombre' => 'Eduardo L',
            'estado' => 'activo',
            'dias_prueba' => 1,
            'persona_id' => 15,
        ]);

        
    }
}
