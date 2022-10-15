<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;
use Carbon\Carbon;


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
            'nombrecorto'=>'DAVID F',
            'dias_prueba'=>2,
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'sueldo'=>2000.00,
            'mododocente_id' =>1,
            'perfil'=>'Sin perfil',
            'estado_id'=>11,
            'persona_id'=>1,
            ]);

                // $docente->nombrecorto=$request->nombrecorto;
                // $docente->fecha_ingreso=$request->fecha_ingreso;
                // $docente->dias_prueba = $request->dias_prueba;
                // $docente->sueldo = $request->sueldo;
                // $docente->modo = $request->modo;
                // $docente->perfil = $request->perfil;
                // $docente->estado_id = $request->estado_id;
                // $docente->persona_id = $persona->id;
        // Docente::create([
        //     'sueldo' => 2000.00,
        //     'fecha_ingreso' => '1998-10-12',
        //     'nombre' => 'Cesar C',
        //     'estado' => 'activo',
        //     'dias_prueba' => 1,
        //     'persona_id' => 32,
        // ]);
        // Docente::create([
        //     'sueldo' => 1100,
        //     'fecha_ingreso' => '1998-10-12',
        //     'nombre' => 'Mailyn R',
        //     'estado' => 'activo',
        //     'dias_prueba' => 1,
        //     'persona_id' => 33,
        // ]);
        // Docente::create([
        //     'sueldo' => 1500.00,
        //     'fecha_ingreso' => '1998-10-12',
        //     'nombre' => 'Victor Z',
        //     'estado' => 'activo',
        //     'dias_prueba' => 1,
        //     'persona_id' => 34,
        // ]);
        // Docente::create([
        //     'sueldo' => 1520.00,
        //     'fecha_ingreso' => '1998-10-12',
        //     'nombre' => 'Eduardo L',
        //     'estado' => 'activo',
        //     'dias_prueba' => 1,
        //     'persona_id' => 35,
        // ]);

        // Docente::find(1)->niveles()->attach(1, ['nivel_id' => 4]);
        // Docente::find(1)->niveles()->attach(1, ['nivel_id' => 5]);
        // Docente::find(1)->niveles()->attach(1, ['nivel_id' => 6]);
        // Docente::find(1)->niveles()->attach(1, ['nivel_id' => 7]);

        // Docente::find(2)->niveles()->attach(1, ['nivel_id' => 3]);
        // Docente::find(2)->niveles()->attach(1, ['nivel_id' => 4]);
        // Docente::find(2)->niveles()->attach(1, ['nivel_id' => 5]);
        // Docente::find(2)->niveles()->attach(1, ['nivel_id' => 6]);
        // Docente::find(2)->niveles()->attach(1, ['nivel_id' => 7]);
        
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 1]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 2]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 3]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 4]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 5]);
        Docente::find(1)->niveles()->attach(1, ['nivel_id' => 6]);
        
        //Docente::find(1)->usuarios()->attach(1);
    }
}
