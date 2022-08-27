<?php
namespace Database\Seeders;

use App\Estudiante;
use App\Inscripcione;
use App\Modalidad;
use App\Models\Homeschedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');
        $this->call([
            PaisSeeder::class,
            CiudadSeeder::class,
            ZonaSeeder::class,
            PersonaSeeder::class,
            UserSeeder::class,
            AdministrativoSeeder::class,
            EstudianteSeeder::class,
            NivelSeeder::class,
            GradoSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            MunicipioSeeder::class,
            AulaSeeder::class,
            EstadoSeeder::class,
            MododocenteSeeder::class,
            DocenteSeeder::class,
            TipomotivoSeeder::class,
            MotivoSeeder::class,
            ModalidadSeeder::class,
            DiaSeeder::class,
            MateriaSeeder::class,
            FeriadoSeeder::class,
            TemaSeeder::class,
            BilleteSeeder::class,
            ColegioSeeder::class,
            ObservacionSeeder::class,
            ComputacionSeeder::class,
            CarreraSeeder::class,
            AsignaturaSeeder::class,
            HomeSeeder::class,
            HomescheduleSeeder::class,
            RoleSeeder::class,
            InterestSeeder::class,
            MensajeSeeder::class,
            EventoSeeder::class,
        ]);
    }  
}
