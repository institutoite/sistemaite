<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% GUARDERIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

        Modalidad::create([
            'modalidad' => 'Guardería por hora libre',
            'costo' => 25,
            'cargahoraria' => 1,
            'nivel_id' => 1
        ]);

        Modalidad::create([
            'modalidad' => 'Guardería turno mañana',
            'costo' => 600,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Guardería turno tarde',
            'costo' => 550,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Guardería todo el día',
            'costo' => 1000,
            'cargahoraria' => 100,
            'nivel_id' => 1
        ]);
        Modalidad::create([
            'modalidad' => 'Guardería hotelito',
            'costo' => 100,
            'cargahoraria' => 8,
            'nivel_id' => 1
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% PRIMARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HORA LIBRE PRIMARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'HORA LIBRE PRIMARIA',
            'costo' => 40,
            'cargahoraria' => 1,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30X50 PRIMARIA',
            'costo' => 50,
            'cargahoraria' => 1.5,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30X60 PRIMARIA',
            'costo' => 60,
            'cargahoraria' => 1.5,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX75 PRIMARIA',
            'costo' => 75,
            'cargahoraria' => 2,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX80 PRIMARIA',
            'costo' => 80,
            'cargahoraria' => 2,
            'nivel_id' => 3
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SEMANA PRIMARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
       
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1HRA PRIMARIA',
            'costo' => 165,
            'cargahoraria' =>5,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA 3VECES 1:30HRAS PRIMARIA',
            'costo' => 170,
            'cargahoraria' =>4.5,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1:30HRAS PRIMARIA',
            'costo' => 216,
            'cargahoraria' =>7.5,
            'nivel_id' => 3
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  QUINCENA PRIMARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1HRA PRIMARIA',
            'costo' => 265,
            'cargahoraria' => 10,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA 3VECES 1:30HRAS PRIMARIA',
            'costo' => 270,
            'cargahoraria' => 9,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1:30HRAS PRIMARIA',
            'costo' => 350,
            'cargahoraria' => 15,
            'nivel_id' => 3
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MES PRIMARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1HRA PRIMARIA',
            'costo' => 420,
            'cargahoraria' => 20,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'MES 3VECES 1:30HRA PRIMARIA',
            'costo' => 430,
            'cargahoraria' => 18,
            'nivel_id' => 3
        ]);
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1:30HRAS PRIMARIA',
            'costo' => 550,
            'cargahoraria' => 30,
            'nivel_id' => 3
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% SECUNDARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HORA LIBRE SECUNDARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'HORA LIBRE SECUNDARIA',
            'costo' => 40,
            'cargahoraria' => 1,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30X50 SECUNDARIA',
            'costo' => 50,
            'cargahoraria' => 1.5,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30X60 SECUNDARIA',
            'costo' => 60,
            'cargahoraria' => 1.5,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX75 SECUNDARIA',
            'costo' => 75,
            'cargahoraria' => 2,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX80 SECUNDARIA',
            'costo' => 80,
            'cargahoraria' => 2,
            'nivel_id' => 4
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SEMANA SECUNDARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
       
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1HRA SECUNDARIA',
            'costo' => 165,
            'cargahoraria' =>5,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA 3VECES 1:30HRAS SECUNDARIA',
            'costo' => 170,
            'cargahoraria' =>4.5,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1:30HRAS SECUNDARIA',
            'costo' => 216,
            'cargahoraria' =>7.5,
            'nivel_id' => 4
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  QUINCENA SECUNDARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1HRA SECUNDARIA',
            'costo' => 265,
            'cargahoraria' => 10,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA 3VECES 1:30HRAS SECUNDARIA',
            'costo' => 270,
            'cargahoraria' => 9,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1:30HRAS SECUNDARIA',
            'costo' => 350,
            'cargahoraria' => 15,
            'nivel_id' => 4
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MES SECUNDARIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1HRA SECUNDARIA',
            'costo' => 420,
            'cargahoraria' => 20,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'MES 3VECES 1:30HRA SECUNDARIA',
            'costo' => 430,
            'cargahoraria' => 18,
            'nivel_id' => 4
        ]);
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1:30HRAS SECUNDARIA',
            'costo' => 550,
            'cargahoraria' => 30,
            'nivel_id' => 4
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% PREUNIVERSITARIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
          /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HORA LIBRE PREUNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'HORA LIBRE PREUNIVERSITARIO',
            'costo' => 45,
            'cargahoraria' => 1,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX60 PREUNIVERSITARIO',
            'costo' => 60,
            'cargahoraria' => 1.5,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX67 PREUNIVERSITARIO',
            'costo' => 67.5,
            'cargahoraria' => 1.5,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX75 PREUNIVERSITARIO',
            'costo' => 75,
            'cargahoraria' => 2,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX80 PREUNIVERSITARIO',
            'costo' => 80,
            'cargahoraria' => 2,
            'nivel_id' => 5
        ]);

        /**38 HASTA AQUI %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SEMANA PREUNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
       
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1HRA PREUNIVERSITARIO',
            'costo' => 165,
            'cargahoraria' =>5,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA 3VECES 1:30HRAS PREUNIVERSITARIO',
            'costo' => 170,
            'cargahoraria' =>4.5,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1:30HRAS PREUNIVERSITARIO',
            'costo' => 216,
            'cargahoraria' =>7.5,
            'nivel_id' => 5
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  QUINCENA PREUNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1HRA PREUNIVERSITARIO',
            'costo' => 265,
            'cargahoraria' => 10,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA 3VECES 1:30HRAS PREUNIVERSITARIO',
            'costo' => 270,
            'cargahoraria' => 9,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1:30HRAS PREUNIVERSITARIO',
            'costo' => 350,
            'cargahoraria' => 15,
            'nivel_id' => 5
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MES PREUNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1HRA PREUNIVERSITARIO',
            'costo' => 420,
            'cargahoraria' => 20,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'MES 3VECES 1:30HRA PREUNIVERSITARIO',
            'costo' => 430,
            'cargahoraria' => 18,
            'nivel_id' => 5
        ]);
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1:30HRAS PREUNIVERSITARIO',
            'costo' => 550,
            'cargahoraria' => 30,
            'nivel_id' => 5
        ]);


        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INSTITUTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
            /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HORA LIBRE INSTITUTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'HORA LIBRE INSTITUTOS',
            'costo' => 45,
            'cargahoraria' => 1,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX60 INSTITUTOS',
            'costo' => 60,
            'cargahoraria' => 1.5,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX67 INSTITUTOS',
            'costo' => 67.5,
            'cargahoraria' => 1.5,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX75 INSTITUTOS',
            'costo' => 75,
            'cargahoraria' => 2,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX80 INSTITUTOS',
            'costo' => 80,
            'cargahoraria' => 2,
            'nivel_id' => 6
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SEMANA INSTITUTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
       
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1HRA INSTITUTOS',
            'costo' => 165,
            'cargahoraria' =>5,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA 3VECES 1:30HRAS INSTITUTOS',
            'costo' => 170,
            'cargahoraria' =>4.5,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1:30HRAS INSTITUTOS',
            'costo' => 216,
            'cargahoraria' =>7.5,
            'nivel_id' => 6
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  QUINCENA INSTITUTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1HRA INSTITUTOS',
            'costo' => 265,
            'cargahoraria' => 10,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA 3VECES 1:30HRAS INSTITUTOS',
            'costo' => 270,
            'cargahoraria' => 9,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1:30HRAS INSTITUTOS',
            'costo' => 350,
            'cargahoraria' => 15,
            'nivel_id' => 6
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MES INSTITUTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1HRA INSTITUTOS',
            'costo' => 420,
            'cargahoraria' => 20,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'MES 3VECES 1:30HRA INSTITUTOS',
            'costo' => 430,
            'cargahoraria' => 18,
            'nivel_id' => 6
        ]);
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1:30HRAS INSTITUTOS',
            'costo' => 550,
            'cargahoraria' => 30,
            'nivel_id' => 6
        ]);

        /**HASTA AQUI 61%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% UNIVERSITARIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HORA LIBRE UNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'HORA LIBRE UNIVERSITARIO',
            'costo' => 50,
            'cargahoraria' => 1,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX65 UNIVERSITARIO',
            'costo' => 65,
            'cargahoraria' => 1.5,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX75 UNIVERSITARIO',
            'costo' => 75,
            'cargahoraria' => 1.5,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX90 UNIVERSITARIO',
            'costo' => 90,
            'cargahoraria' => 2,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX100 UNIVERSITARIO',
            'costo' => 100,
            'cargahoraria' => 2,
            'nivel_id' => 7
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SEMANA UNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
       
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1HRA UNIVERSITARIO',
            'costo' => 185,
            'cargahoraria' =>5,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA 3VECES 1:30HRAS UNIVERSITARIO',
            'costo' => 180,
            'cargahoraria' =>4.5,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1:30HRAS UNIVERSITARIO',
            'costo' => 255,
            'cargahoraria' =>7.5,
            'nivel_id' => 7
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  QUINCENA UNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1HRA UNIVERSITARIO',
            'costo' => 300,
            'cargahoraria' => 10,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA 3VECES 1:30HRAS UNIVERSITARIO',
            'costo' => 288,
            'cargahoraria' => 9,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1:30HRAS UNIVERSITARIO',
            'costo' => 420,
            'cargahoraria' => 15,
            'nivel_id' => 7
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MES UNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1HRA UNIVERSITARIO',
            'costo' => 550,
            'cargahoraria' => 20,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'MES 3VECES 1:30HRA UNIVERSITARIO',
            'costo' => 504,
            'cargahoraria' => 18,
            'nivel_id' => 7
        ]);
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1:30HRAS UNIVERSITARIO',
            'costo' => 750,
            'cargahoraria' => 30,
            'nivel_id' => 7
        ]);


        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% PROFESIONALES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HORA LIBRE UNIVERSITARIO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'HORA LIBRE PROFESIONALES',
            'costo' => 50,
            'cargahoraria' => 1,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX75 PROFESIONALES',
            'costo' => 75,
            'cargahoraria' => 1.5,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 1:30HRASX90 PROFESIONALES',
            'costo' => 90,
            'cargahoraria' => 1.5,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX90 PROFESIONALES',
            'costo' => 90,
            'cargahoraria' => 2,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'HORA LIBRE 2HRASX100 PROFESIONALES',
            'costo' => 100,
            'cargahoraria' => 2,
            'nivel_id' => 8
        ]);

        /**HASTA AQUI 80 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  SEMANA PROFESIONALES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
       
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1HRA PROFESIONALES',
            'costo' => 225,
            'cargahoraria' =>5,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA 3VECES 1:30HRAS PROFESIONALES',
            'costo' => 207,
            'cargahoraria' =>4.5,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'SEMANA LU-VI 1:30HRAS PROFESIONALES',
            'costo' => 330,
            'cargahoraria' =>7.5,
            'nivel_id' => 8
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  QUINCENA PROFESIONALES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1HRA PROFESIONALES',
            'costo' => 420,
            'cargahoraria' => 10,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA 3VECES 1:30HRAS PROFESIONALES',
            'costo' => 387,
            'cargahoraria' => 9,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'QUINCENA LU-VI 1:30HRAS PROFESIONALES',
            'costo' => 600,
            'cargahoraria' => 15,
            'nivel_id' => 8
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MES PROFESIONALES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1HRA PROFESIONALES',
            'costo' => 700,
            'cargahoraria' => 20,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'MES 3VECES 1:30HRA PROFESIONALES',
            'costo' => 648,
            'cargahoraria' => 18,
            'nivel_id' => 8
        ]);
        Modalidad::create([
            'modalidad' => 'MES LU-VI 1:30HRAS PROFESIONALES',
            'costo' => 900,
            'cargahoraria' => 30,
            'nivel_id' => 8
        ]);

        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%TOTAL 89 MODALIDADES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        Modalidad::find(1)->usuarios()->attach(1);
        Modalidad::find(2)->usuarios()->attach(1);
        Modalidad::find(3)->usuarios()->attach(1);
        Modalidad::find(4)->usuarios()->attach(1);
        Modalidad::find(5)->usuarios()->attach(1);
        Modalidad::find(6)->usuarios()->attach(1);
        Modalidad::find(7)->usuarios()->attach(1);
        Modalidad::find(8)->usuarios()->attach(1);
        Modalidad::find(9)->usuarios()->attach(1);

        Modalidad::find(10)->usuarios()->attach(1);
        Modalidad::find(11)->usuarios()->attach(1);
        Modalidad::find(12)->usuarios()->attach(1);
        Modalidad::find(13)->usuarios()->attach(1);
        Modalidad::find(14)->usuarios()->attach(1);
        Modalidad::find(15)->usuarios()->attach(1);
        Modalidad::find(16)->usuarios()->attach(1);
        Modalidad::find(17)->usuarios()->attach(1);
        Modalidad::find(18)->usuarios()->attach(1);
        Modalidad::find(19)->usuarios()->attach(1);

        Modalidad::find(20)->usuarios()->attach(1);
        Modalidad::find(21)->usuarios()->attach(1);
        Modalidad::find(22)->usuarios()->attach(1);
        Modalidad::find(23)->usuarios()->attach(1);
        Modalidad::find(24)->usuarios()->attach(1);
        Modalidad::find(25)->usuarios()->attach(1);
        Modalidad::find(26)->usuarios()->attach(1);
        Modalidad::find(27)->usuarios()->attach(1);
        Modalidad::find(28)->usuarios()->attach(1);
        Modalidad::find(29)->usuarios()->attach(1);

        Modalidad::find(30)->usuarios()->attach(1);
        Modalidad::find(31)->usuarios()->attach(1);
        Modalidad::find(32)->usuarios()->attach(1);
        Modalidad::find(33)->usuarios()->attach(1);
        Modalidad::find(34)->usuarios()->attach(1);
        Modalidad::find(35)->usuarios()->attach(1);
        Modalidad::find(36)->usuarios()->attach(1);
        Modalidad::find(37)->usuarios()->attach(1);
        Modalidad::find(38)->usuarios()->attach(1);
        Modalidad::find(39)->usuarios()->attach(1);

        Modalidad::find(40)->usuarios()->attach(1);
        Modalidad::find(41)->usuarios()->attach(1);
        Modalidad::find(42)->usuarios()->attach(1);
        Modalidad::find(43)->usuarios()->attach(1);
        Modalidad::find(44)->usuarios()->attach(1);
        Modalidad::find(45)->usuarios()->attach(1);
        Modalidad::find(46)->usuarios()->attach(1);
        Modalidad::find(47)->usuarios()->attach(1);
        Modalidad::find(48)->usuarios()->attach(1);
        Modalidad::find(49)->usuarios()->attach(1);

        Modalidad::find(50)->usuarios()->attach(1);
        Modalidad::find(51)->usuarios()->attach(1);
        Modalidad::find(52)->usuarios()->attach(1);
        Modalidad::find(53)->usuarios()->attach(1);
        Modalidad::find(54)->usuarios()->attach(1);
        Modalidad::find(55)->usuarios()->attach(1);
        Modalidad::find(56)->usuarios()->attach(1);
        Modalidad::find(57)->usuarios()->attach(1);
        Modalidad::find(58)->usuarios()->attach(1);
        Modalidad::find(59)->usuarios()->attach(1);

        Modalidad::find(60)->usuarios()->attach(1);
        Modalidad::find(61)->usuarios()->attach(1);
        Modalidad::find(62)->usuarios()->attach(1);
        Modalidad::find(63)->usuarios()->attach(1);
        Modalidad::find(64)->usuarios()->attach(1);
        Modalidad::find(65)->usuarios()->attach(1);
        Modalidad::find(66)->usuarios()->attach(1);
        Modalidad::find(67)->usuarios()->attach(1);
        Modalidad::find(68)->usuarios()->attach(1);
        Modalidad::find(69)->usuarios()->attach(1);

        Modalidad::find(70)->usuarios()->attach(1);
        Modalidad::find(71)->usuarios()->attach(1);
        Modalidad::find(72)->usuarios()->attach(1);
        Modalidad::find(73)->usuarios()->attach(1);
        Modalidad::find(74)->usuarios()->attach(1);
        Modalidad::find(75)->usuarios()->attach(1);
        Modalidad::find(76)->usuarios()->attach(1);
        Modalidad::find(77)->usuarios()->attach(1);
        Modalidad::find(78)->usuarios()->attach(1);
        Modalidad::find(79)->usuarios()->attach(1);

        Modalidad::find(80)->usuarios()->attach(1);
        Modalidad::find(81)->usuarios()->attach(1);
        Modalidad::find(82)->usuarios()->attach(1);
        Modalidad::find(83)->usuarios()->attach(1);
        Modalidad::find(84)->usuarios()->attach(1);
        Modalidad::find(85)->usuarios()->attach(1);
        
    }
}
