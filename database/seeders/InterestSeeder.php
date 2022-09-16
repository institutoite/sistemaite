<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Interest;
class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::create(['interest'=>'Inicial']);
        Interest::create(['interest'=>'Primaria']);
        Interest::create(['interest'=>'Guardería']);
        Interest::create(['interest'=>'Secundaria']);
        Interest::create(['interest'=>'Bachilleres']);
        Interest::create(['interest'=>'PSA-UAGRM']);
        Interest::create(['interest'=>'CUP-UAGRM']);
        
        Interest::create(['interest'=>'Universitario']);
        Interest::create(['interest'=>'Robótica']);
        Interest::create(['interest'=>'Computación']);
        Interest::create(['interest'=>'Diseño-Gráfico']);
        Interest::create(['interest'=>'Programación']);
        
        Interest::create(['interest'=>'Fotocopia']);
        Interest::create(['interest'=>'Impresión']);
        Interest::create(['interest'=>'Prácticos']);
        Interest::create(['interest'=>'Videobooth']);
        Interest::create(['interest'=>'Desarrollo-App-Movil']);
        Interest::create(['interest'=>'Desarrollo-App-Web']);
        Interest::create(['interest'=>'Experimentos']);


        Interest::findOrFail(1)->usuarios()->attach(1);
        Interest::findOrFail(2)->usuarios()->attach(1);
        Interest::findOrFail(3)->usuarios()->attach(1);
        Interest::findOrFail(4)->usuarios()->attach(1);
        Interest::findOrFail(5)->usuarios()->attach(1);

        Interest::findOrFail(6)->usuarios()->attach(1);
        Interest::findOrFail(7)->usuarios()->attach(1);
        Interest::findOrFail(8)->usuarios()->attach(1);
        Interest::findOrFail(9)->usuarios()->attach(1);
        Interest::findOrFail(10)->usuarios()->attach(1);

        Interest::findOrFail(11)->usuarios()->attach(1);
        Interest::findOrFail(12)->usuarios()->attach(1);
        Interest::findOrFail(13)->usuarios()->attach(1);
        Interest::findOrFail(14)->usuarios()->attach(1);
        Interest::findOrFail(15)->usuarios()->attach(1);
        Interest::findOrFail(16)->usuarios()->attach(1);
        
    }
}
