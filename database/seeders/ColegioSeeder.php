<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colegio;
class ColegioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colegio::factory()->count(10)->create();
        
        Colegio::find(1)->usuarios()->attach(1);
        Colegio::find(2)->usuarios()->attach(1);
        Colegio::find(3)->usuarios()->attach(1);
        Colegio::find(4)->usuarios()->attach(1);
        Colegio::find(5)->usuarios()->attach(1);
        
        Colegio::find(6)->usuarios()->attach(1);
        Colegio::find(7)->usuarios()->attach(1);
        Colegio::find(8)->usuarios()->attach(1);
        Colegio::find(9)->usuarios()->attach(1);
        Colegio::find(10)->usuarios()->attach(1);
    }
}
