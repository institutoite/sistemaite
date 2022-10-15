<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create(['grado' => 'guarderia','nivel_id'=>1]);
        Grado::create(['grado' => 'Nidito', 'nivel_id' =>1 ]);
        Grado::create(['grado' => 'Pre Kinder','nivel_id'=>2]);
        Grado::create(['grado' => 'Kinder','nivel_id'=>2]);
        
        Grado::create(['grado' => 'Primero primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Segundo primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Tercero primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Cuarto primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Quinto primaria','nivel_id'=>3]);
        Grado::create(['grado' => 'Sexto primaria','nivel_id'=>3]);
/*10 */
        Grado::create(['grado' => 'Primero Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Segundo Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Tercero Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Cuarto Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Quinto Secundaria', 'nivel_id' => 4]);
        Grado::create(['grado' => 'Sexto Secundaria', 'nivel_id' => 4]);

        Grado::create(['grado' => 'pre-universitario', 'nivel_id' =>5]);
        Grado::create(['grado' => 'colegio militar', 'nivel_id' => 5]);
        Grado::create(['grado' => 'escuela policiaca', 'nivel_id' => 5]);
  /*19 */      
        Grado::create(['grado' => 'Primer Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Segundo Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Tercer Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Cuarto Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Quinto Semestre Institutos', 'nivel_id' =>6]);
        Grado::create(['grado' => 'Sexto Semestre Institutos', 'nivel_id' =>6]);

        Grado::create(['grado' => 'Primer Año Institutos', 'nivel_id' => 6]);
        Grado::create(['grado' => 'Segundo Año Institutos', 'nivel_id' => 6]);
        Grado::create(['grado' => 'Tercer Año Institutos', 'nivel_id' => 6]);

        Grado::create(['grado' => 'Primer Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Segundo Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Tercer Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Cuarto Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Quinto Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Sexto Semestre Universidad', 'nivel_id' => 7]);
        Grado::create(['grado' => 'Septimo Semestre Universidad', 'nivel_id' =>7 ]);
        Grado::create(['grado' => 'Octavo Semestre Universidad', 'nivel_id' =>7 ]);
        Grado::create(['grado' => 'Noveno Semestre Universidad', 'nivel_id' =>7 ]);
        Grado::create(['grado' => 'Decimo Semestre Universidad', 'nivel_id' =>7 ]);
        
        Grado::create(['grado' => 'Proyecto Grado', 'nivel_id' =>8 ]);
        Grado::create(['grado' => 'Maestría', 'nivel_id' => 8]);
        Grado::create(['grado' => 'Diplomado', 'nivel_id' =>8]);
        Grado::create(['grado' => 'Profesional', 'nivel_id' => 8]);
/*42*/
        Grado::find(1)->usuarios()->attach(1);
        Grado::find(2)->usuarios()->attach(1);
        Grado::find(3)->usuarios()->attach(1);
        Grado::find(4)->usuarios()->attach(1);
        Grado::find(5)->usuarios()->attach(1);
        Grado::find(6)->usuarios()->attach(1);
        Grado::find(7)->usuarios()->attach(1);
        Grado::find(8)->usuarios()->attach(1);
        Grado::find(9)->usuarios()->attach(1);

        Grado::find(10)->usuarios()->attach(1);
        Grado::find(11)->usuarios()->attach(1);
        Grado::find(12)->usuarios()->attach(1);
        Grado::find(13)->usuarios()->attach(1);
        Grado::find(14)->usuarios()->attach(1);
        Grado::find(15)->usuarios()->attach(1);
        Grado::find(16)->usuarios()->attach(1);
        Grado::find(17)->usuarios()->attach(1);
        Grado::find(18)->usuarios()->attach(1);
        Grado::find(19)->usuarios()->attach(1);

        Grado::find(20)->usuarios()->attach(1);
        Grado::find(21)->usuarios()->attach(1);
        Grado::find(22)->usuarios()->attach(1);
        Grado::find(23)->usuarios()->attach(1);
        Grado::find(24)->usuarios()->attach(1);
        Grado::find(25)->usuarios()->attach(1);
        Grado::find(26)->usuarios()->attach(1);
        Grado::find(27)->usuarios()->attach(1);
        Grado::find(28)->usuarios()->attach(1);
        Grado::find(29)->usuarios()->attach(1);

        Grado::find(30)->usuarios()->attach(1);
        Grado::find(31)->usuarios()->attach(1);
        Grado::find(32)->usuarios()->attach(1);
        Grado::find(33)->usuarios()->attach(1);
        Grado::find(34)->usuarios()->attach(1);
        Grado::find(35)->usuarios()->attach(1);
        Grado::find(36)->usuarios()->attach(1);
        Grado::find(37)->usuarios()->attach(1);
        Grado::find(38)->usuarios()->attach(1);
        Grado::find(39)->usuarios()->attach(1);
        Grado::find(40)->usuarios()->attach(1);

        Grado::find(41)->usuarios()->attach(1);
        Grado::find(42)->usuarios()->attach(1);

        
        
    }
}
