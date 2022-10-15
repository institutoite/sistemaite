<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provincia;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE SANTA CRUZ %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Andrés Ibáñez', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Ángel Sandoval', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Chiquitos', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Cordillera', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Florida', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Germán Busch', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Guarayos', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Ichilo', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Ignacio Warnes', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'José Miguel de Velasco', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Manuel María Caballero', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Ñuflo de Chaves', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Obispo Santistevan', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Sara', 'departamento_id' => 1]);
        Provincia::create(['provincia' => 'Vallegrande', 'departamento_id' => 1]);

        Provincia::find(1)->usuarios()->attach(1);
        Provincia::find(2)->usuarios()->attach(1);
        Provincia::find(3)->usuarios()->attach(1);
        Provincia::find(4)->usuarios()->attach(1);
        Provincia::find(5)->usuarios()->attach(1);
        Provincia::find(6)->usuarios()->attach(1);
        Provincia::find(7)->usuarios()->attach(1);
        Provincia::find(8)->usuarios()->attach(1);
        Provincia::find(9)->usuarios()->attach(1);
        Provincia::find(10)->usuarios()->attach(1);
        Provincia::find(11)->usuarios()->attach(1);
        Provincia::find(12)->usuarios()->attach(1);
        Provincia::find(13)->usuarios()->attach(1);
        Provincia::find(14)->usuarios()->attach(1);
        Provincia::find(15)->usuarios()->attach(1);
        
        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE LA PAZ %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Abel Iturralde', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Aroma', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Bautista Saavedra', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Caranavi', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Eliodoro Camacho', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Franz Tamayo', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'General José Manuel Pando', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Gualberto Villarroel', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Ingaví', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Inquisivi', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'José Ramón Loayza', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Larecaja', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Los Andes', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Manco Kapac', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Muñecas', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Nor Yungas', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Omasuyos', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Pacajes', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Pedro Domingo Murillo', 'departamento_id' => 2]);
        Provincia::create(['provincia' => 'Sud Yungas', 'departamento_id' => 2]);

        Provincia::find(16)->usuarios()->attach(1);
        Provincia::find(17)->usuarios()->attach(1);
        Provincia::find(18)->usuarios()->attach(1);
        Provincia::find(19)->usuarios()->attach(1);
        Provincia::find(20)->usuarios()->attach(1);
        Provincia::find(21)->usuarios()->attach(1);
        Provincia::find(22)->usuarios()->attach(1);
        Provincia::find(23)->usuarios()->attach(1);
        Provincia::find(24)->usuarios()->attach(1);
        Provincia::find(25)->usuarios()->attach(1);
        Provincia::find(26)->usuarios()->attach(1);
        Provincia::find(27)->usuarios()->attach(1);
        Provincia::find(28)->usuarios()->attach(1);
        Provincia::find(29)->usuarios()->attach(1);
        Provincia::find(30)->usuarios()->attach(1);
        Provincia::find(31)->usuarios()->attach(1);
        Provincia::find(32)->usuarios()->attach(1);
        Provincia::find(33)->usuarios()->attach(1);
        Provincia::find(34)->usuarios()->attach(1);
        Provincia::find(35)->usuarios()->attach(1);

        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE COCHABAMBA %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Arani', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Arque', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Ayopaya', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Bolívar', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Campero', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Capinota', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Cercado', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Chapare', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Esteban Arze', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Germán Jordán', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'José Carrasco', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Mizque', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Punata', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Quillacollo', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Tapacarí', 'departamento_id' => 3]);
        Provincia::create(['provincia' => 'Tiraque', 'departamento_id' => 3]);

        Provincia::find(36)->usuarios()->attach(1);
        Provincia::find(37)->usuarios()->attach(1);
        Provincia::find(38)->usuarios()->attach(1);
        Provincia::find(39)->usuarios()->attach(1);
        Provincia::find(40)->usuarios()->attach(1);
        Provincia::find(41)->usuarios()->attach(1);
        Provincia::find(42)->usuarios()->attach(1);
        Provincia::find(43)->usuarios()->attach(1);
        Provincia::find(44)->usuarios()->attach(1);
        Provincia::find(45)->usuarios()->attach(1);
        Provincia::find(46)->usuarios()->attach(1);
        Provincia::find(47)->usuarios()->attach(1);
        Provincia::find(48)->usuarios()->attach(1);
        Provincia::find(49)->usuarios()->attach(1);
        Provincia::find(50)->usuarios()->attach(1);
        Provincia::find(51)->usuarios()->attach(1);

        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE CHUQUISACA %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Belisario Boeto', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Hernando Siles', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Jaime Zudáñez', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Juana Azurduy de Padilla', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Luis Calvo', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Nor Cinti', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Samuel Oropeza', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Sud Cinti', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Tomina', 'departamento_id' => 4]);
        Provincia::create(['provincia' => 'Yamparáez', 'departamento_id' => 4]);

        Provincia::find(52)->usuarios()->attach(1);
        Provincia::find(53)->usuarios()->attach(1);
        Provincia::find(54)->usuarios()->attach(1);
        Provincia::find(55)->usuarios()->attach(1);
        Provincia::find(56)->usuarios()->attach(1);
        Provincia::find(57)->usuarios()->attach(1);
        Provincia::find(58)->usuarios()->attach(1);
        Provincia::find(59)->usuarios()->attach(1);
        Provincia::find(60)->usuarios()->attach(1);
        Provincia::find(61)->usuarios()->attach(1);


        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE TARIJA %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Aniceto Arce', 'departamento_id' => 5]);
        Provincia::create(['provincia' => 'Burdet O Connor', 'departamento_id' => 5]);
        Provincia::create(['provincia' => 'Cercado', 'departamento_id' => 5]);
        Provincia::create(['provincia' => 'Eustaquio Méndez', 'departamento_id' => 5]);
        Provincia::create(['provincia' => 'Gran Chaco', 'departamento_id' => 5]);
        Provincia::create(['provincia' => 'José María Avilés', 'departamento_id' => 5]);

        

        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE ORURO %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Carangas', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Cercado', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Eduardo Abaroa', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Ladislao Cabrera', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Litoral de Atacama', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Mejillones', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Nor Carangas', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Pantaleón Dalence', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Poopó', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Sabaya', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Sajama', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'San Pedro de Totora', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Saucarí', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Sebastián Pagador', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Sud Carangas', 'departamento_id' => 6]);
        Provincia::create(['provincia' => 'Tomás Barrón', 'departamento_id' => 6]);

        

        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE POTOSI %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Alonso de Ibáñez', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Antonio Quijarro', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Bernardino Bilbao', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Charcas', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Chayanta', 'departamento_id' => 7]);

        Provincia::create(['provincia' => 'Cornelio Saavedra', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Daniel Campos', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Enrique Baldivieso', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'José María Linares', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Modesto Omiste', 'departamento_id' => 7]);

        Provincia::create(['provincia' => 'Nor Chichas', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Nor Lípez', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Rafael Bustillo', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Sud Chichas', 'departamento_id' => 7]);
        Provincia::create(['provincia' => 'Sud Lípez', 'departamento_id' => 7]);

        Provincia::create(['provincia' => 'Tomás Frías', 'departamento_id' => 7]);

        

        

        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE BENI %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Cercado', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'General José Ballivián Segurola', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'Iténez', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'Mamoré', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'Marbán', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'Moxos', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'Vaca Díez', 'departamento_id' => 8]);
        Provincia::create(['provincia' => 'Yacuma', 'departamento_id' => 8]);
        
       
 
        /** %%%%%%%%%%%%%%%%%%%%  PROVINCIAS DE PANDO %%%%%%%%%%%%%%%%%%%%%*/
        Provincia::create(['provincia' => 'Abuná', 'departamento_id' => 9]);
        Provincia::create(['provincia' => 'General Federico Román', 'departamento_id' => 9]);
        Provincia::create(['provincia' => 'Madre de Dios', 'departamento_id' => 9]);
        Provincia::create(['provincia' => 'Manuripi', 'departamento_id' => 9]);
        Provincia::create(['provincia' => 'Nicolás Suárez', 'departamento_id' => 9]);
        
       
        Provincia::find(62)->usuarios()->attach(1);
        Provincia::find(63)->usuarios()->attach(1);
        Provincia::find(64)->usuarios()->attach(1);
        Provincia::find(65)->usuarios()->attach(1);
        Provincia::find(66)->usuarios()->attach(1);
        Provincia::find(67)->usuarios()->attach(1);
        Provincia::find(68)->usuarios()->attach(1);
        Provincia::find(69)->usuarios()->attach(1);

        Provincia::find(70)->usuarios()->attach(1);
        Provincia::find(71)->usuarios()->attach(1);
        Provincia::find(72)->usuarios()->attach(1);
        Provincia::find(73)->usuarios()->attach(1);
        Provincia::find(74)->usuarios()->attach(1);
        Provincia::find(75)->usuarios()->attach(1);
        Provincia::find(76)->usuarios()->attach(1);
        Provincia::find(77)->usuarios()->attach(1);
        Provincia::find(78)->usuarios()->attach(1);
        Provincia::find(79)->usuarios()->attach(1);
        

        Provincia::find(80)->usuarios()->attach(1);
        Provincia::find(81)->usuarios()->attach(1);
        Provincia::find(82)->usuarios()->attach(1);
        Provincia::find(83)->usuarios()->attach(1);
        Provincia::find(84)->usuarios()->attach(1);
        Provincia::find(85)->usuarios()->attach(1);
        Provincia::find(86)->usuarios()->attach(1);
        Provincia::find(87)->usuarios()->attach(1);
        Provincia::find(88)->usuarios()->attach(1);
        Provincia::find(89)->usuarios()->attach(1);
        

        Provincia::find(90)->usuarios()->attach(1);
        Provincia::find(91)->usuarios()->attach(1);
        Provincia::find(92)->usuarios()->attach(1);
        Provincia::find(93)->usuarios()->attach(1);
        Provincia::find(94)->usuarios()->attach(1);
        Provincia::find(95)->usuarios()->attach(1);
        Provincia::find(96)->usuarios()->attach(1);
        Provincia::find(97)->usuarios()->attach(1);
        Provincia::find(98)->usuarios()->attach(1);
        Provincia::find(99)->usuarios()->attach(1);
        

        Provincia::find(100)->usuarios()->attach(1);
        Provincia::find(101)->usuarios()->attach(1);
        Provincia::find(102)->usuarios()->attach(1);
        Provincia::find(103)->usuarios()->attach(1);
        Provincia::find(104)->usuarios()->attach(1);
        Provincia::find(105)->usuarios()->attach(1);
        Provincia::find(106)->usuarios()->attach(1);
        Provincia::find(107)->usuarios()->attach(1);
        Provincia::find(108)->usuarios()->attach(1);
        Provincia::find(109)->usuarios()->attach(1);

        Provincia::find(110)->usuarios()->attach(1);
        Provincia::find(111)->usuarios()->attach(1);
        Provincia::find(112)->usuarios()->attach(1);
        

    }
}
