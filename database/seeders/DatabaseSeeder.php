<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Persona;
use App\User;
use App\Pais;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        $this->call([
            UserSeeder::class,
            PaisSeeder::class,
            CiudadSeeder::class,
            ZonaSeeder::class,
            PersonaSeeder::class,
            GradoSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            MunicipioSeeder::class,

        ]);

        
    }  
}
