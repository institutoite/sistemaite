<?php

namespace Database\Seeders;

use App\Models\Observacion;
use Illuminate\Database\Seeder;
use App\Models\Persona;


class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Persona::create([
            'nombre' => 'DAVID EDUARDO',
            'apellidop' => 'FLORES',
            'apellidom' => 'BELTRAN',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Melgar',
            'carnet' => '456135',
            'expedido' => 'BEN',
            'habilitado' => 1,
            'telefono' => "71324941",
            'genero' => 'HOMBRE',
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
            
        ]);

        

        Persona::create([
            'nombre' => 'LIDIA',
            'apellidop' => 'CONTRERAS',
            'apellidom' => 'CATARI',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'Barrio Luis Soruco Barba',
            'carnet' => '45615535',
            'expedido' => 'BEN',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "71324941",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'estudiante',
            
        ]);
        
        Persona::create([
            'nombre' => 'BENJAMIN',
            'apellidop' => 'CALLATA',
            'apellidom' => 'FLORES',
            'fechanacimiento' => '26-11-1998',
            'direccion' => 'Av. Genecheru',
            'carnet' => '45615535',
            'expedido' => 'BEN',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "67775278",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 6,
            'como_id' => 2,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
        Persona::create([
            'nombre' => 'EDUARDO',
            'apellidop' => 'LOZA',
            'apellidom' => 'MORALES',
            'fechanacimiento' => '02-09-1978',
            'direccion' => 'calle 8 #6 oeste',
            'carnet' => '5347005',
            'expedido' => 'SC',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "70404048",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como_id' => 2,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
        Persona::create([
            'nombre' => 'EDSON',
            'apellidop' => 'MANCILLA',
            'apellidom' => 'RODRIGUEZ',
            'fechanacimiento' => '12-07-1991',
            'direccion' => 'RADIAL 26 QUINTO ANILLO #5595 ZONA NORTE',
            'carnet' => '12474073',
            'expedido' => 'SC',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "77889250",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 19,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
        Persona::create([
            'nombre' => 'EDUARDO',
            'apellidop' => 'LLANOS',
            'apellidom' => 'CACERES',
            'fechanacimiento' => '04-07-1995',
            'direccion' => 'BARRIO LA PASCANA',
            'carnet' => '12474073',
            'expedido' => 'SC',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "69026020",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 6,
            'como_id' => 2,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
        Persona::create([
            'nombre' => 'WILBERTH JHONNY',
            'apellidop' => 'ALEJO',
            'apellidom' => 'SIÑANI',
            'fechanacimiento' => '15-01-1996',
            'direccion' => 'SEGUNDO ANILLO AV TARUMA',
            'carnet' => '9124342',
            'expedido' => 'SC',
            'genero' => 'HOMBRE',
            'habilitado' => 1,
            'telefono' => "74522765",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 16,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
       
        Persona::create([
            'nombre' => 'ELSA',
            'apellidop' => 'FLORES',
            'apellidom' => 'JIMENEZ',
            'fechanacimiento' => '01-01-1900',
            'direccion' => 'SIN DEFINIR',
            'carnet' => '',
            'expedido' => '',
            'genero' => 'MUJER',
            'habilitado' => 1,
            'telefono' => "75542645",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 16,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
        Persona::create([
            'nombre' => 'MAYLIN',
            'apellidop' => 'RODAS',
            'apellidom' => 'ROMERO',
            'fechanacimiento' => '25-09-1989',
            'direccion' => 'BARRIO LAS AMERICAS ',
            'carnet' => '123456',
            'expedido' => 'SC',
            'genero' => 'MUJER',
            'habilitado' => 1,
            'telefono' => "76083900",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 20,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
        Persona::create([
            'nombre' => 'MARIA ISABEL',
            'apellidop' => 'NINA',
            'apellidom' => 'SEGUNDO',
            'fechanacimiento' => '21-01-1995',
            'direccion' => 'URBANIZACION EL QUIOR BARRIO 10 DE MAYO',
            'carnet' => '12632139',
            'expedido' => 'SC',
            'genero' => 'MUJER',
            'habilitado' => 1,
            'telefono' => "79470815",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 2,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'docente',
        ]);
         Persona::create([
            'nombre' => 'SUSANA',
            'apellidop' => 'PETIGA',
            'apellidom' => 'MASAI',
            'fechanacimiento' => '15-05-2015',
            'direccion' => 'PLAN 3000',
            'carnet' => '45615535',
            'expedido' => 'BEN',
            'genero' => 'MUJER',
            'habilitado' => 1,
            'telefono' => "75553338",
            'pais_id' => 1,
            'ciudad_id' => 6,
            'zona_id' => 1,
            'como_id' => 1,
            'foto' => "estudiantes/foto.jpg",
            'papelinicial' => 'administrativo',
            
        ]);

        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>1,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>2,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial de administrativos",
            "activo" =>1,
            "observable_id"=>3,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>4,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>5,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial de administrativos",
            "activo" =>1,
            "observable_id"=>6,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>7,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial",
            "activo" =>1,
            "observable_id"=>8,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial de administrativos",
            "activo" =>1,
            "observable_id"=>9,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial de administrativos",
            "activo" =>1,
            "observable_id"=>10,
            "observable_type"=>"App\Models\Persona",
        ]);
        Observacion::create([
            "observacion" =>"Esta es una observation insertada desde un seeder inicial de administrativos",
            "activo" =>1,
            "observable_id"=>11,
            "observable_type"=>"App\Models\Persona",
        ]);

     
        
    }
}
