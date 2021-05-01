<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

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
            NivelSeeder::class,
            AulaSeeder::class,
            DocenteSeeder::class,
        ]);

        
    }  
}
