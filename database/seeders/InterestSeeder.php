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

        Interest::findOrFail(1)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(2)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(3)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(4)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(5)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(6)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(7)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(8)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(9)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(10)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(11)->userable()->create(['user_id'=>1]);
        Interest::findOrFail(12)->userable()->create(['user_id'=>1]);
    }
}
