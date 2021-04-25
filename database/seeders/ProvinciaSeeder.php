<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Provincia;

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

    }
}
