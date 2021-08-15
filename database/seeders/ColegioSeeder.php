<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Colegio;
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
    }
}
