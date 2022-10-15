<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Billete;

class BilleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Billete::create(['corte' => 200]);
        Billete::create(['corte' => 100]);
        Billete::create(['corte' => 50]);
        Billete::create(['corte' => 20]);
        Billete::create(['corte' => 10]);
        
        Billete::create(['corte' => 5]);
        Billete::create(['corte' => 2]);
        Billete::create(['corte' => 1]);
        Billete::create(['corte' => 0.5]);
        Billete::create(['corte' => 0.2]);
        
        Billete::create(['corte' => 0.1]);
        
        Billete::find(1)->usuarios()->attach(1);
        Billete::find(2)->usuarios()->attach(1);
        Billete::find(3)->usuarios()->attach(1);
        Billete::find(4)->usuarios()->attach(1);
        Billete::find(5)->usuarios()->attach(1);

        Billete::find(6)->usuarios()->attach(1);
        Billete::find(7)->usuarios()->attach(1);
        Billete::find(8)->usuarios()->attach(1);
        Billete::find(9)->usuarios()->attach(1);
        Billete::find(10)->usuarios()->attach(1);

        Billete::find(11)->usuarios()->attach(1);
    }
}
