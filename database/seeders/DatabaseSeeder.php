<?php
namespace Database\Seeders;

use App\Models\Estudiante;
use App\Models\Inscripcione;
use App\Models\Modalidad;
use App\Models\Ciudad;
use App\Models\Pais;
use App\Models\Cargo;
use App\Models\Zona;
use App\Models\Como;
use App\Models\Departamento;
use App\Models\Mododocente;
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
            ConvenioSeeder::class,
            PaisSeeder::class,
            CiudadSeeder::class,
            ZonaSeeder::class,
            ComoSeeder::class,
            PersonaSeeder::class,
            UserSeeder::class,
            CargoSeeder::class,
            EstadoSeeder::class,
            AdministrativoSeeder::class,
            EstudianteSeeder::class,
            NivelSeeder::class,
            GradoSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            MunicipioSeeder::class,
            AulaSeeder::class,
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
            ConstanteSeeder::class,
            
        ]);
        
        Ciudad::find(1)->usuarios()->attach(1);
        Ciudad::find(2)->usuarios()->attach(1);
        Ciudad::find(3)->usuarios()->attach(1);
        Ciudad::find(4)->usuarios()->attach(1);
        Ciudad::find(5)->usuarios()->attach(1);
        Ciudad::find(6)->usuarios()->attach(1);
        Ciudad::find(7)->usuarios()->attach(1);
        Ciudad::find(8)->usuarios()->attach(1);
        Ciudad::find(9)->usuarios()->attach(1);
        
        Ciudad::find(11)->usuarios()->attach(1);
        Ciudad::find(12)->usuarios()->attach(1);
        Ciudad::find(13)->usuarios()->attach(1);
        Ciudad::find(14)->usuarios()->attach(1);
        Ciudad::find(15)->usuarios()->attach(1);
        Ciudad::find(16)->usuarios()->attach(1);
        Ciudad::find(17)->usuarios()->attach(1);
        Ciudad::find(18)->usuarios()->attach(1);
        Ciudad::find(19)->usuarios()->attach(1);
        
        Ciudad::find(20)->usuarios()->attach(1);
        Ciudad::find(21)->usuarios()->attach(1);
        Ciudad::find(22)->usuarios()->attach(1);
        Ciudad::find(23)->usuarios()->attach(1);
        Ciudad::find(24)->usuarios()->attach(1);
        Ciudad::find(25)->usuarios()->attach(1);
        Ciudad::find(26)->usuarios()->attach(1);
        Ciudad::find(27)->usuarios()->attach(1);
        Ciudad::find(28)->usuarios()->attach(1);
        Ciudad::find(29)->usuarios()->attach(1);
        
        
        Ciudad::find(30)->usuarios()->attach(1);
        Ciudad::find(31)->usuarios()->attach(1);
        Ciudad::find(32)->usuarios()->attach(1);
        Ciudad::find(33)->usuarios()->attach(1);
        Ciudad::find(34)->usuarios()->attach(1);
        Ciudad::find(35)->usuarios()->attach(1);
        Ciudad::find(36)->usuarios()->attach(1);
        Ciudad::find(37)->usuarios()->attach(1);
        Ciudad::find(38)->usuarios()->attach(1);
        Ciudad::find(39)->usuarios()->attach(1);
        
        Ciudad::find(40)->usuarios()->attach(1);
        Ciudad::find(41)->usuarios()->attach(1);
        Ciudad::find(42)->usuarios()->attach(1);
        Ciudad::find(43)->usuarios()->attach(1);
        Ciudad::find(44)->usuarios()->attach(1);
        Ciudad::find(45)->usuarios()->attach(1);
        Ciudad::find(46)->usuarios()->attach(1);
        Ciudad::find(47)->usuarios()->attach(1);
        Ciudad::find(48)->usuarios()->attach(1);
        Ciudad::find(49)->usuarios()->attach(1);
        
        Ciudad::find(50)->usuarios()->attach(1);
        Ciudad::find(51)->usuarios()->attach(1);
        Ciudad::find(52)->usuarios()->attach(1);
        Ciudad::find(53)->usuarios()->attach(1);
        Ciudad::find(54)->usuarios()->attach(1);
        Ciudad::find(55)->usuarios()->attach(1);
        Ciudad::find(56)->usuarios()->attach(1);
        Ciudad::find(57)->usuarios()->attach(1);
        Ciudad::find(58)->usuarios()->attach(1);
        Ciudad::find(59)->usuarios()->attach(1);
        
        Ciudad::find(60)->usuarios()->attach(1);
        Ciudad::find(61)->usuarios()->attach(1);
        Ciudad::find(62)->usuarios()->attach(1);
        Ciudad::find(63)->usuarios()->attach(1);
        Ciudad::find(64)->usuarios()->attach(1);
        Ciudad::find(65)->usuarios()->attach(1);
        Ciudad::find(66)->usuarios()->attach(1);
        Ciudad::find(67)->usuarios()->attach(1);
        Ciudad::find(68)->usuarios()->attach(1);
        Ciudad::find(69)->usuarios()->attach(1);
        
        Ciudad::find(70)->usuarios()->attach(1);
        Ciudad::find(71)->usuarios()->attach(1);
        Ciudad::find(72)->usuarios()->attach(1);
        Ciudad::find(73)->usuarios()->attach(1);
        Ciudad::find(74)->usuarios()->attach(1);
        Ciudad::find(75)->usuarios()->attach(1);
        Ciudad::find(76)->usuarios()->attach(1);
        Ciudad::find(77)->usuarios()->attach(1);
        Ciudad::find(78)->usuarios()->attach(1);
        Ciudad::find(79)->usuarios()->attach(1);
        
        Ciudad::find(80)->usuarios()->attach(1);
        Ciudad::find(81)->usuarios()->attach(1);
        Ciudad::find(82)->usuarios()->attach(1);
        Ciudad::find(83)->usuarios()->attach(1);
        Ciudad::find(84)->usuarios()->attach(1);
        Ciudad::find(85)->usuarios()->attach(1);
        Ciudad::find(86)->usuarios()->attach(1);
        Ciudad::find(87)->usuarios()->attach(1);
        Ciudad::find(88)->usuarios()->attach(1);
        Ciudad::find(89)->usuarios()->attach(1);
        
        Ciudad::find(80)->usuarios()->attach(1);
        Ciudad::find(81)->usuarios()->attach(1);
        Ciudad::find(82)->usuarios()->attach(1);
        Ciudad::find(83)->usuarios()->attach(1);
        Ciudad::find(84)->usuarios()->attach(1);
        Ciudad::find(85)->usuarios()->attach(1);
        Ciudad::find(86)->usuarios()->attach(1);
        Ciudad::find(87)->usuarios()->attach(1);
        Ciudad::find(88)->usuarios()->attach(1);
        Ciudad::find(89)->usuarios()->attach(1);
        
        Ciudad::find(90)->usuarios()->attach(1);
        Ciudad::find(91)->usuarios()->attach(1);
        Ciudad::find(92)->usuarios()->attach(1);
        Ciudad::find(93)->usuarios()->attach(1);
        Ciudad::find(94)->usuarios()->attach(1);
        Ciudad::find(95)->usuarios()->attach(1);
        Ciudad::find(96)->usuarios()->attach(1);
        Ciudad::find(97)->usuarios()->attach(1);
        Ciudad::find(98)->usuarios()->attach(1);
        Ciudad::find(99)->usuarios()->attach(1);
        
        Ciudad::find(100)->usuarios()->attach(1);
        Ciudad::find(101)->usuarios()->attach(1);
        Ciudad::find(102)->usuarios()->attach(1);
        Ciudad::find(103)->usuarios()->attach(1);
        Ciudad::find(104)->usuarios()->attach(1);
        Ciudad::find(105)->usuarios()->attach(1);
        Ciudad::find(106)->usuarios()->attach(1);
        Ciudad::find(107)->usuarios()->attach(1);
        Ciudad::find(108)->usuarios()->attach(1);
        Ciudad::find(109)->usuarios()->attach(1);
        
        Ciudad::find(110)->usuarios()->attach(1);
        Ciudad::find(111)->usuarios()->attach(1);
        Ciudad::find(112)->usuarios()->attach(1);
        Ciudad::find(113)->usuarios()->attach(1);
        Ciudad::find(114)->usuarios()->attach(1);
        Ciudad::find(115)->usuarios()->attach(1);
        Ciudad::find(116)->usuarios()->attach(1);
        Ciudad::find(117)->usuarios()->attach(1);
        Ciudad::find(118)->usuarios()->attach(1);
        Ciudad::find(119)->usuarios()->attach(1);
        
        Ciudad::find(120)->usuarios()->attach(1);
        Ciudad::find(121)->usuarios()->attach(1);
        Ciudad::find(122)->usuarios()->attach(1);
        Ciudad::find(123)->usuarios()->attach(1);
        Ciudad::find(124)->usuarios()->attach(1);
        Ciudad::find(125)->usuarios()->attach(1);
        Ciudad::find(126)->usuarios()->attach(1);
        Ciudad::find(127)->usuarios()->attach(1);
        Ciudad::find(128)->usuarios()->attach(1);
        Ciudad::find(129)->usuarios()->attach(1);
        
        Ciudad::find(130)->usuarios()->attach(1);
        Ciudad::find(131)->usuarios()->attach(1);
        Ciudad::find(132)->usuarios()->attach(1);
        Ciudad::find(133)->usuarios()->attach(1);
        Ciudad::find(134)->usuarios()->attach(1);
        Ciudad::find(135)->usuarios()->attach(1);
        Ciudad::find(136)->usuarios()->attach(1);
        Ciudad::find(137)->usuarios()->attach(1);
        Ciudad::find(138)->usuarios()->attach(1);
        Ciudad::find(139)->usuarios()->attach(1);
        
        Ciudad::find(140)->usuarios()->attach(1);
        Ciudad::find(141)->usuarios()->attach(1);
        Ciudad::find(142)->usuarios()->attach(1);
        Ciudad::find(143)->usuarios()->attach(1);
        Ciudad::find(144)->usuarios()->attach(1);
        Ciudad::find(145)->usuarios()->attach(1);
        Ciudad::find(146)->usuarios()->attach(1);
        Ciudad::find(147)->usuarios()->attach(1);
        Ciudad::find(148)->usuarios()->attach(1);
        Ciudad::find(149)->usuarios()->attach(1);
        
        Ciudad::find(150)->usuarios()->attach(1);
        Ciudad::find(151)->usuarios()->attach(1);
        Ciudad::find(152)->usuarios()->attach(1);
        Ciudad::find(153)->usuarios()->attach(1);
        Ciudad::find(154)->usuarios()->attach(1);
        Ciudad::find(155)->usuarios()->attach(1);
        Ciudad::find(156)->usuarios()->attach(1);
        Ciudad::find(157)->usuarios()->attach(1);
        Ciudad::find(158)->usuarios()->attach(1);
        Ciudad::find(159)->usuarios()->attach(1);
        
        Ciudad::find(160)->usuarios()->attach(1);
        Ciudad::find(161)->usuarios()->attach(1);
        Ciudad::find(162)->usuarios()->attach(1);
        Ciudad::find(163)->usuarios()->attach(1);
        Ciudad::find(164)->usuarios()->attach(1);
        Ciudad::find(165)->usuarios()->attach(1);
        Ciudad::find(166)->usuarios()->attach(1);
        Ciudad::find(167)->usuarios()->attach(1);
        Ciudad::find(168)->usuarios()->attach(1);
        Ciudad::find(169)->usuarios()->attach(1);
        
        Ciudad::find(170)->usuarios()->attach(1);
        Ciudad::find(171)->usuarios()->attach(1);
        Ciudad::find(172)->usuarios()->attach(1);
        Ciudad::find(173)->usuarios()->attach(1);
        Ciudad::find(174)->usuarios()->attach(1);
        Ciudad::find(175)->usuarios()->attach(1);
        Ciudad::find(176)->usuarios()->attach(1);
        Ciudad::find(177)->usuarios()->attach(1);
        Ciudad::find(178)->usuarios()->attach(1);
        Ciudad::find(179)->usuarios()->attach(1);
        
        Ciudad::find(180)->usuarios()->attach(1);
        Ciudad::find(181)->usuarios()->attach(1);
        Ciudad::find(182)->usuarios()->attach(1);
        Ciudad::find(183)->usuarios()->attach(1);
        Ciudad::find(184)->usuarios()->attach(1);
        Ciudad::find(185)->usuarios()->attach(1);
        Ciudad::find(186)->usuarios()->attach(1);
        Ciudad::find(187)->usuarios()->attach(1);
        Ciudad::find(188)->usuarios()->attach(1);
        Ciudad::find(189)->usuarios()->attach(1);
        
        Ciudad::find(190)->usuarios()->attach(1);
        Ciudad::find(191)->usuarios()->attach(1);
        Ciudad::find(192)->usuarios()->attach(1);
        Ciudad::find(193)->usuarios()->attach(1);
        Ciudad::find(194)->usuarios()->attach(1);
        Ciudad::find(195)->usuarios()->attach(1);
        Ciudad::find(196)->usuarios()->attach(1);
        Ciudad::find(197)->usuarios()->attach(1);
        Ciudad::find(198)->usuarios()->attach(1);
        Ciudad::find(199)->usuarios()->attach(1);
        
        Ciudad::find(200)->usuarios()->attach(1);
        Ciudad::find(201)->usuarios()->attach(1);
        Ciudad::find(202)->usuarios()->attach(1);
        

        /*%%%%%%%%%%%%%%%%%%%%CARGO %%%%%%%%*/
        Cargo::find(1)->usuarios()->attach(1);
        Cargo::find(2)->usuarios()->attach(1);
        Cargo::find(3)->usuarios()->attach(1);
        Cargo::find(4)->usuarios()->attach(1);
        
        /*%%%%%%%%%%%%%%%%%%%%PAIS %%%%%%%%*/
        
        Pais::find(1)->usuarios()->attach(1);
        Pais::find(2)->usuarios()->attach(1);
        Pais::find(3)->usuarios()->attach(1);
        Pais::find(4)->usuarios()->attach(1);
        Pais::find(5)->usuarios()->attach(1);
        Pais::find(6)->usuarios()->attach(1);
        Pais::find(7)->usuarios()->attach(1);
        Pais::find(8)->usuarios()->attach(1);
        Pais::find(9)->usuarios()->attach(1);

        Pais::find(10)->usuarios()->attach(1);
        Pais::find(11)->usuarios()->attach(1);
        Pais::find(12)->usuarios()->attach(1);
        Pais::find(13)->usuarios()->attach(1);
        Pais::find(14)->usuarios()->attach(1);
        Pais::find(15)->usuarios()->attach(1);
        Pais::find(16)->usuarios()->attach(1);
        Pais::find(17)->usuarios()->attach(1);
        Pais::find(18)->usuarios()->attach(1);
        Pais::find(19)->usuarios()->attach(1);

        Pais::find(20)->usuarios()->attach(1);
        Pais::find(21)->usuarios()->attach(1);
        Pais::find(22)->usuarios()->attach(1);
        Pais::find(23)->usuarios()->attach(1);
        Pais::find(24)->usuarios()->attach(1);
        Pais::find(25)->usuarios()->attach(1);
        Pais::find(26)->usuarios()->attach(1);
        Pais::find(27)->usuarios()->attach(1);
        Pais::find(28)->usuarios()->attach(1);
        Pais::find(29)->usuarios()->attach(1);

        Pais::find(30)->usuarios()->attach(1);
        Pais::find(31)->usuarios()->attach(1);
        Pais::find(32)->usuarios()->attach(1);
        Pais::find(33)->usuarios()->attach(1);
        Pais::find(34)->usuarios()->attach(1);
        Pais::find(35)->usuarios()->attach(1);
        Pais::find(36)->usuarios()->attach(1);
        Pais::find(37)->usuarios()->attach(1);
        Pais::find(38)->usuarios()->attach(1);
        Pais::find(39)->usuarios()->attach(1);

        Pais::find(40)->usuarios()->attach(1);
        Pais::find(41)->usuarios()->attach(1);
        Pais::find(42)->usuarios()->attach(1);
        Pais::find(43)->usuarios()->attach(1);
        Pais::find(44)->usuarios()->attach(1);
        Pais::find(45)->usuarios()->attach(1);
        Pais::find(46)->usuarios()->attach(1);
        Pais::find(47)->usuarios()->attach(1);
        Pais::find(48)->usuarios()->attach(1);
        Pais::find(49)->usuarios()->attach(1);

        Pais::find(50)->usuarios()->attach(1);
        Pais::find(51)->usuarios()->attach(1);
        Pais::find(52)->usuarios()->attach(1);
        Pais::find(53)->usuarios()->attach(1);
        Pais::find(54)->usuarios()->attach(1);
        Pais::find(55)->usuarios()->attach(1);
        Pais::find(56)->usuarios()->attach(1);
        Pais::find(57)->usuarios()->attach(1);
        Pais::find(58)->usuarios()->attach(1);
        Pais::find(59)->usuarios()->attach(1);

        Pais::find(60)->usuarios()->attach(1);
        Pais::find(61)->usuarios()->attach(1);
        Pais::find(62)->usuarios()->attach(1);
        Pais::find(63)->usuarios()->attach(1);
        Pais::find(64)->usuarios()->attach(1);
        Pais::find(65)->usuarios()->attach(1);
        Pais::find(66)->usuarios()->attach(1);
        Pais::find(67)->usuarios()->attach(1);
        Pais::find(68)->usuarios()->attach(1);
        Pais::find(69)->usuarios()->attach(1);

        Pais::find(70)->usuarios()->attach(1);
        Pais::find(71)->usuarios()->attach(1);
        Pais::find(72)->usuarios()->attach(1);
        Pais::find(73)->usuarios()->attach(1);
        Pais::find(74)->usuarios()->attach(1);
        Pais::find(75)->usuarios()->attach(1);
        Pais::find(76)->usuarios()->attach(1);
        Pais::find(77)->usuarios()->attach(1);
        Pais::find(78)->usuarios()->attach(1);
        Pais::find(79)->usuarios()->attach(1);

        Pais::find(80)->usuarios()->attach(1);
        Pais::find(81)->usuarios()->attach(1);
        Pais::find(82)->usuarios()->attach(1);
        
        /*%%%%%%%%%%%%%%%% DEPARTAMENTOS %%%%%%%%%%%%%%%%%%%%%*/
        Departamento::find(1)->usuarios()->attach(1);
        Departamento::find(2)->usuarios()->attach(1);
        Departamento::find(3)->usuarios()->attach(1);
        Departamento::find(4)->usuarios()->attach(1);
        Departamento::find(5)->usuarios()->attach(1);
        Departamento::find(6)->usuarios()->attach(1);
        Departamento::find(7)->usuarios()->attach(1);
        Departamento::find(8)->usuarios()->attach(1);
        Departamento::find(9)->usuarios()->attach(1);
        
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ZONA %%%%%%%%%%%%%%%%%%*/
        Zona::find(1)->usuarios()->attach(1);
        Zona::find(2)->usuarios()->attach(1);
        Zona::find(3)->usuarios()->attach(1);
        Zona::find(4)->usuarios()->attach(1);
        Zona::find(5)->usuarios()->attach(1);
        Zona::find(6)->usuarios()->attach(1);
        Zona::find(7)->usuarios()->attach(1);
        Zona::find(8)->usuarios()->attach(1);
        Zona::find(9)->usuarios()->attach(1);
        Zona::find(10)->usuarios()->attach(1);
        
        Zona::find(11)->usuarios()->attach(1);
        Zona::find(12)->usuarios()->attach(1);
        Zona::find(13)->usuarios()->attach(1);
        Zona::find(14)->usuarios()->attach(1);
        Zona::find(15)->usuarios()->attach(1);
        Zona::find(16)->usuarios()->attach(1);
        Zona::find(17)->usuarios()->attach(1);
        Zona::find(18)->usuarios()->attach(1);
        Zona::find(19)->usuarios()->attach(1);

        /**%%%%%%%%%%%%%%% como %%%%%%%%%%%%%%%%%%%*/
        Como::find(1)->usuarios()->attach(1);
        Como::find(2)->usuarios()->attach(1);
        Como::find(3)->usuarios()->attach(1);
        Como::find(4)->usuarios()->attach(1);
        Como::find(5)->usuarios()->attach(1);

        Como::find(6)->usuarios()->attach(1);
        Como::find(7)->usuarios()->attach(1);
        Como::find(8)->usuarios()->attach(1);
        Como::find(9)->usuarios()->attach(1);
        Como::find(10)->usuarios()->attach(1);
        /* %%%%%%%%%%%%%%%%%%%% MODODOCENTE %%%%%%%%%%%%% */
        Mododocente::find(1)->usuarios()->attach(1);
        Mododocente::find(2)->usuarios()->attach(1);
        Mododocente::find(3)->usuarios()->attach(1);
        Mododocente::find(4)->usuarios()->attach(1);
        Mododocente::find(5)->usuarios()->attach(1);
    }  
}
