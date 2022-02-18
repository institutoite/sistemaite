<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $admin= Role::create(['name' => 'Admin']);
        $secretary= Role::create(['name' => 'Secretary']);
        $teacher= Role::create(['name' => 'Teacher']);
        $student= Role::create(['name' => 'Student']); */

        Permission::create(['name' => 'Listar Asignaturas']);
        Permission::create(['name' => 'Crear Asignaturas']);
        Permission::create(['name' => 'Editar Asignaturas']);
        Permission::create(['name' => 'Eliminar Asignaturas']);

        Permission::create(['name' => 'Listar Aulas']);
        Permission::create(['name' => 'Crear Aulas']);
        Permission::create(['name' => 'Editar Aulas']);
        Permission::create(['name' => 'Eliminar Aulas']);

        Permission::create(['name' => 'Listar Carreras']);
        Permission::create(['name' => 'Crear Carreras']);
        Permission::create(['name' => 'Editar Carreras']);
        Permission::create(['name' => 'Eliminar Carreras']);

        Permission::create(['name' => 'Listar Colegios']);
        Permission::create(['name' => 'Crear Colegios']);
        Permission::create(['name' => 'Editar Colegios']);
        Permission::create(['name' => 'Eliminar Colegios']);

        Permission::create(['name' => 'Listar Docentes']);
        Permission::create(['name' => 'Crear Docentes']);
        Permission::create(['name' => 'Editar Docentes']);
        Permission::create(['name' => 'Eliminar Docentes']);

        Permission::create(['name' => 'Listar Estudiantes']);
        Permission::create(['name' => 'Crear Estudiantes']);
        Permission::create(['name' => 'Editar Estudiantes']);
        Permission::create(['name' => 'Eliminar Estudiantes']);

        Permission::create(['name' => 'Listar Feriados']);
        Permission::create(['name' => 'Crear Feriados']);
        Permission::create(['name' => 'Editar Feriados']);
        Permission::create(['name' => 'Eliminar Feriados']);

        Permission::create(['name' => 'Listar Grados']);
        Permission::create(['name' => 'Crear Grados']);
        Permission::create(['name' => 'Editar Grados']);
        Permission::create(['name' => 'Eliminar Grados']);

        Permission::create(['name' => 'Listar Precios']);
        Permission::create(['name' => 'Crear Precios']);
        Permission::create(['name' => 'Editar Precios']);
        Permission::create(['name' => 'Eliminar Precios']);

        Permission::create(['name' => 'Listar Horarios']);
        Permission::create(['name' => 'Crear Horarios']);
        Permission::create(['name' => 'Editar Horarios']);
        Permission::create(['name' => 'Eliminar Horarios']);

        Permission::create(['name' => 'Listar Inscripciones']);
        Permission::create(['name' => 'Crear Inscripciones']);
        Permission::create(['name' => 'Editar Inscripciones']);
        Permission::create(['name' => 'Eliminar Inscripciones']);

        Permission::create(['name' => 'Listar Materias']);
        Permission::create(['name' => 'Crear Materias']);
        Permission::create(['name' => 'Editar Materias']);
        Permission::create(['name' => 'Eliminar Materias']);

        Permission::create(['name' => 'Listar Modalidades']);
        Permission::create(['name' => 'Crear Modalidades']);
        Permission::create(['name' => 'Editar Modalidades']);
        Permission::create(['name' => 'Eliminar Modalidades']);

        Permission::create(['name' => 'Listar Metas']);
        Permission::create(['name' => 'Crear Metas']);
        Permission::create(['name' => 'Editar Metas']);
        Permission::create(['name' => 'Eliminar Metas']);

        Permission::create(['name' => 'Listar Motivos']);
        Permission::create(['name' => 'Crear Motivos']);
        Permission::create(['name' => 'Editar Motivos']);
        Permission::create(['name' => 'Eliminar Motivos']);

        Permission::create(['name' => 'Listar Niveles']);
        Permission::create(['name' => 'Crear Niveles']);
        Permission::create(['name' => 'Editar Niveles']);
        Permission::create(['name' => 'Eliminar Niveles']);

        Permission::create(['name' => 'Listar Temas']);
        Permission::create(['name' => 'Crear Temas']);
        Permission::create(['name' => 'Editar Temas']);
        Permission::create(['name' => 'Eliminar Temas']);
    }
}
