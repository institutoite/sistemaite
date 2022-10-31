<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudad;
use App\Models\Userable;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Ciudad::create(['ciudad' => 'Cobija', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Cochabamba', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'La Paz', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Oruro', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Potosí', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Santa Cruz de la Sierra', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Sucre', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tarija', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Trinidad', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Abapó', 'pais_id' => 1]);
        
        //2
        Ciudad::create(['ciudad' => 'Achacachi', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Achocalla', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Agua de Castilla', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Aiquile', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Amarete', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Apolo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Arani', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Arbieto', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Arroyo Concepción', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Ascensión de Guarayos', 'pais_id' => 1]);
        
        //3
        Ciudad::create(['ciudad' => 'Atocha', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Batallas', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Baures', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Belice', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Bella Vista', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Bermejo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Betanzos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Boyuibe', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Buena Vista', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Bulo Bulo', 'pais_id' => 1]);
        //4
        Ciudad::create(['ciudad' => 'Cabezas', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Cala Cala', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Camargo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Camiri', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Campanero', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Campo Grande', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Candua', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Caracollo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Caranavi', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Caraparí', 'pais_id' => 1]);
        //5
        Ciudad::create(['ciudad' => 'Catavi', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Challapata', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Chané Independencia', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Charagua', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Chayanta', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Chimoré', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Chulumani', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Cliza', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Colcapirhua', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Collana', 'pais_id' => 1]);
        //6
        Ciudad::create(['ciudad' => 'Colomi', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Colquechaca', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Colquencha', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Colquiri', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Comarapa', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Concepción', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Copacabana', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Coroico', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Cotagaita', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Cotoca', 'pais_id' => 1]);
        //7
        Ciudad::create(['ciudad' => 'Cuatro Cañadas', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Cuevo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Culpina', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Desaguadero', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'El Alto', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'El Carmen Rivero Tórrez', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'El Paso', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'El Puente', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'El Sena', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'El Torno', 'pais_id' => 1]);
        //8
        Ciudad::create(['ciudad' => 'Entre Ríos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Entre Ríos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Eterazama', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Eucaliptus', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Fernández Alonso', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'General Saavedra', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Guanay', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Guayaramerín', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Hardeman', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Huacaraje', 'pais_id' => 1]);
        //9
        Ciudad::create(['ciudad' => 'Huanuni', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Irpa Irpa', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Ivirgarzama', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Ixiamas', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Jorochito', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'La Asunta', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'La Bélgica', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'La Guardia', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Lahuachaca', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Las Barreras', 'pais_id' => 1]);
        //10
        Ciudad::create(['ciudad' => 'Limoncito', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Llallagua', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Los Negros', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Machacamarca', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Magdalena', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Mairana', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Manco Kapac', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Mapiri', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Mineros', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Mizque', 'pais_id' => 1]);
        //11
        Ciudad::create(['ciudad' => 'Monteagudo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Montero', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Muyupampa', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Okinawa I', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Padilla', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Pailón', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Palos Blancos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Pandoja', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Parotani', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Pasorapa', 'pais_id' => 1]);
        //12
        Ciudad::create(['ciudad' => 'Patacamaya', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Pedro Lorenzo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Poopó', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Porco', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Portachuelo', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Porvenir', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Presto', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puchucollo Alto', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puente San Pablo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puerto Pailas', 'pais_id' => 1]);
        //13
        Ciudad::create(['ciudad' => 'Puerto Quijarro', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puerto Rico', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puerto Rico', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puerto Suárez', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Puerto Villarroel', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Punata', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Quillacollo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Quime', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Reyes', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Riberalta', 'pais_id' => 1]);
        //14
        Ciudad::create(['ciudad' => 'Roboré', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Rurrenabaque', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Sacaba', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Sacaca', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Saipina', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Samaipata', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Benito', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Benito', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Borja', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Buenaventura', 'pais_id' => 1]);
        //15
        Ciudad::create(['ciudad' => 'San Carlos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Germán', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Ignacio de Moxos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Ignacio de Velasco', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Javier', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'San Joaquín', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San José', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San José de Chiquitos', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Juan de Yapacaní', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Julián', 'pais_id' => 1]);
        //16
        Ciudad::create(['ciudad' => 'San Lorenzo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Matías', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Miguel', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Pedro', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Rafael', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'San Ramón', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'San Ramón', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santa Ana del Yacuma', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santa Bárbara', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santa Fe de Yapacaní', 'pais_id' => 1]);
        //17
        Ciudad::create(['ciudad' => 'Santa Rita', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santa Rosa de Mapiri', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santa Rosa de Yacuma', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santa Rosa del Sara', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Santiago de Huari', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Shinahota', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Sica Sica', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Siglo XX', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Sipe Sipe', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Sorata', 'pais_id' => 1]);
        //18
        Ciudad::create(['ciudad' => 'Tarabuco', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tarata', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tasna Rosario', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tipuani', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tiquipaya', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Tiraque', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tito Yupanqui', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tolata', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tres Cruces', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Tumarapi', 'pais_id' => 1]);
        //19
        Ciudad::create(['ciudad' => 'Tupiza', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Ucureña', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Uncía', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Urubichá', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Urubó', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Uyuni', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Vallegrande', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Viacha', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Villa 14 de Septiembre', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Villa Capinota', 'pais_id' => 1]);
        //20
        Ciudad::create(['ciudad' => 'Villa Montes', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Villa Serrano', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Villa Tunari', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Villa Yapacaní', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Villazón', 'pais_id' => 1]);
        
        Ciudad::create(['ciudad' => 'Vinto', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Warnes', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Yacuiba', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Yaguarú', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Yotaú', 'pais_id' => 1]);
        //21
        Ciudad::create(['ciudad' => 'Yucumo', 'pais_id' => 1]);
        Ciudad::create(['ciudad' => 'Zudáñez', 'pais_id' => 1]);

        
    
    }
}
