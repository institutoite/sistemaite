<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Pais::create(['nombrepais' => 'Bolivia']);
        Pais::create(['nombrepais' => 'Alaska']);
        Pais::create(['nombrepais' => 'Albania']);
        Pais::create(['nombrepais' => 'Alemania']);
        Pais::create(['nombrepais' => 'Andorra']);
        //2
        Pais::create(['nombrepais' => 'Angola']);
        Pais::create(['nombrepais' => 'Arabia Saudí']);
        Pais::create(['nombrepais' => 'Argelia']);
        Pais::create(['nombrepais' => 'Argentina']);
        Pais::create(['nombrepais' => 'Armenia']);
        //3
        Pais::create(['nombrepais' => 'Australia']);
        Pais::create(['nombrepais' => 'Austria']);
        Pais::create(['nombrepais' => 'Bahreim']);
        Pais::create(['nombrepais' => 'Bangladesh']);
        Pais::create(['nombrepais' => 'Bélgica']);
        //4
        Pais::create(['nombrepais' => 'Bosnia']);
        Pais::create(['nombrepais' => 'Brasil']);
        Pais::create(['nombrepais' => 'Bulgaria']);
        Pais::create(['nombrepais' => 'Cabo Verde']);
        Pais::create(['nombrepais' => 'Camboya']);
        //5
        Pais::create(['nombrepais' => 'Camerún']);
        Pais::create(['nombrepais' => 'Canadá']);
        Pais::create(['nombrepais' => 'Centroafricana, Rep.']);
        Pais::create(['nombrepais' => 'Checa, Rep.']);
        Pais::create(['nombrepais' => 'Chile']);
        //6
        Pais::create(['nombrepais' => 'China']);
        Pais::create(['nombrepais' => 'Chipre']);
        Pais::create(['nombrepais' => 'Colombia']);
        Pais::create(['nombrepais' => 'Congo, Rep. del']);
        Pais::create(['nombrepais' => 'Congo, Rep. Democ.']);
        //7
        Pais::create(['nombrepais' => 'Corea, Rep.']);
        Pais::create(['nombrepais' => 'Corea, Rep. Democ.']);
        Pais::create(['nombrepais' => 'Costa de Marfil']);
        Pais::create(['nombrepais' => 'Costa Rica']);
        Pais::create(['nombrepais' => 'Croacia']);
        //8
        Pais::create(['nombrepais' => 'Cuba']);
        Pais::create(['nombrepais' => 'Dinamarca']);
        Pais::create(['nombrepais' => 'Dominicana, Rep.']);
        Pais::create(['nombrepais' => 'Ecuador']);
        Pais::create(['nombrepais' => 'Egipto']);
        //9
        Pais::create(['nombrepais' => 'El Salvador']);
        Pais::create(['nombrepais' => 'Emiratos Árabes Unidos']);
        Pais::create(['nombrepais' => 'Eslovaca, Rep.']);
        Pais::create(['nombrepais' => 'Eslovenia']);
        Pais::create(['nombrepais' => 'España']);
        //10
        Pais::create(['nombrepais' => 'Estados Unidos']);
        Pais::create(['nombrepais' => 'Estonia']);
        Pais::create(['nombrepais' => 'Etiopía']);
        Pais::create(['nombrepais' => 'Filipinas']);
        Pais::create(['nombrepais' => 'Finlandia']);
        //11
        Pais::create(['nombrepais' => 'Francia']);
        Pais::create(['nombrepais' => 'Gibraltar']);
        Pais::create(['nombrepais' => 'Grecia']);
        Pais::create(['nombrepais' => 'Groenlandia']);
        Pais::create(['nombrepais' => 'Guatemala']);
        //12
        Pais::create(['nombrepais' => 'Guinea Ecuatorial']);
        Pais::create(['nombrepais' => 'Haití']);
        Pais::create(['nombrepais' => 'Hawai']);
        Pais::create(['nombrepais' => 'Honduras']);
        Pais::create(['nombrepais' => 'Hong Kong']);
        //13
        Pais::create(['nombrepais' => 'Hungría']);
        Pais::create(['nombrepais' => 'India']);
        Pais::create(['nombrepais' => 'Indonesia']);
        Pais::create(['nombrepais' => 'Irak']);
        Pais::create(['nombrepais' => 'Irán']);
        //14
        Pais::create(['nombrepais' => 'Irlanda']);
        Pais::create(['nombrepais' => 'Islandia']);
        Pais::create(['nombrepais' => 'Israel']);
        Pais::create(['nombrepais' => 'Italia']);
        Pais::create(['nombrepais' => 'Jamaica']);
        //15
        Pais::create(['nombrepais' => 'Japón']);
        Pais::create(['nombrepais' => 'Jordania']);
        Pais::create(['nombrepais' => 'Kenia']);
        Pais::create(['nombrepais' => 'Kuwait']);
        Pais::create(['nombrepais' => 'Laos']);
        //16
        Pais::create(['nombrepais' => 'Letonia']);
        Pais::create(['nombrepais' => 'Líbano']);
        Pais::create(['nombrepais' => 'Liberia']);
        Pais::create(['nombrepais' => 'Libia']);
        Pais::create(['nombrepais' => 'Liechtenstein']);
        //17
        Pais::create(['nombrepais' => 'Lituania']);
        Pais::create(['nombrepais' => 'Luxemburgo']);

        // Pais::findOrFail(1)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(2)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(3)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(4)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(5)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(6)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(7)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(8)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(9)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(10)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(11)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(12)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(13)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(14)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(15)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(16)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(17)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(18)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(19)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(20)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(21)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(22)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(23)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(24)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(25)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(26)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(27)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(28)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(29)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(30)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(31)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(32)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(33)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(34)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(35)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(36)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(37)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(38)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(39)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(40)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(41)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(42)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(43)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(44)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(45)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(46)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(47)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(48)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(49)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(50)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(51)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(52)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(53)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(54)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(55)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(56)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(57)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(58)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(59)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(60)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(61)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(62)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(63)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(64)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(65)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(66)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(67)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(68)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(69)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(70)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(71)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(72)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(73)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(74)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(75)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(76)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(77)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(78)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(79)->userable()->create(['user_id'=>1]);
    
        // Pais::findOrFail(80)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(81)->userable()->create(['user_id'=>1]);
        // Pais::findOrFail(82)->userable()->create(['user_id'=>1]);
        
    }
}

