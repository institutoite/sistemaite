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
        Interest::create(['interest'=>'Guardería']);
        Interest::create(['interest'=>'Inicial']);
        Interest::create(['interest'=>'Primari']);
        Interest::create(['interest'=>'Secundaria']);
        Interest::create(['interest'=>'Pre Universitario']);
        Interest::create(['interest'=>'Universitario']);
        Interest::create(['interest'=>'Robótica']);
        Interest::create(['interest'=>'Computación']);
        Interest::create(['interest'=>'Diseño Gráfico']);
        Interest::create(['interest'=>'Programación']);
        Interest::create(['interest'=>'Fotocopia']);
        Interest::create(['interest'=>'Practicos']);
    }
}
