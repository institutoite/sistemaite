<?php
namespace Database\Seeders;

use App\Estudiante;
use App\Inscripcione;
use App\Modalidad;
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
            EstudianteSeeder::class,
            NivelSeeder::class,
            GradoSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            MunicipioSeeder::class,
            AulaSeeder::class,
            DocenteSeeder::class,
            MotivoSeeder::class,
            ModalidadSeeder::class,
            DiaSeeder::class,
            MateriaSeeder::class,
            FeriadoSeeder::class,
            TemaSeeder::class,
            BilleteSeeder::class,
            ColegioSeeder::class,
            AdministrativoSeeder::class,
            ObservacionSeeder::class,
            ComputacionSeeder::class,
            CarreraSeeder::class,
            AsignaturaSeeder::class,

        ]);

        
    }  
}
