<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin= Role::create(['name' => 'Admin']);
        $secre = Role::create(['name' => 'Secretaria']);
        $teacher = Role::create(['name' => 'Docente']);
        /* $student= Role::create(['name' => 'Estudiante']);  */

        Permission::create(['name' => 'Listar Asignaturas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Asignaturas'])->assignRole($admin);
        Permission::create(['name' => 'Editar Asignaturas'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Asignaturas'])->assignRole($admin);

        Permission::create(['name' => 'Listar Aulas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Aulas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Aulas'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Aulas'])->syncRoles([$admin, $secre]);

        Permission::create(['name' => 'Listar Carreras'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Carreras'])->assignRole($admin);
        Permission::create(['name' => 'Editar Carreras'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Carreras'])->assignRole($admin);

        Permission::create(['name' => 'Listar Colegios'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Colegios'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Colegios'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Colegios'])->syncRoles([$admin, $secre]);

        Permission::create(['name' => 'Listar Docentes'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Docentes'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Docentes'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Docentes'])->syncRoles([$admin, $secre]);

        Permission::create(['name' => 'Listar Estudiantes'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Estudiantes'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Estudiantes'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Estudiantes'])->syncRoles([$admin, $secre]);

        Permission::create(['name' => 'Listar Feriados'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Feriados'])->assignRole($admin);
        Permission::create(['name' => 'Editar Feriados'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Feriados'])->assignRole($admin);

        Permission::create(['name' => 'Listar Grados'])->assignRole($admin);
        Permission::create(['name' => 'Crear Grados'])->assignRole($admin);
        Permission::create(['name' => 'Editar Grados'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Grados'])->assignRole($admin);

        Permission::create(['name' => 'Listar Precios'])->assignRole($admin);
        Permission::create(['name' => 'Crear Precios'])->assignRole($admin);
        Permission::create(['name' => 'Editar Precios'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Precios'])->assignRole($admin);

        Permission::create(['name' => 'Listar Horarios'])->assignRole($admin);
        Permission::create(['name' => 'Crear Horarios'])->assignRole($admin);
        Permission::create(['name' => 'Editar Horarios'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Horarios'])->assignRole($admin);

        Permission::create(['name' => 'Listar Inscripciones'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Inscripciones'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Inscripciones'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Inscripciones'])->syncRoles([$admin, $secre]);

        Permission::create(['name' => 'Listar Materias'])->assignRole($admin);
        Permission::create(['name' => 'Crear Materias'])->assignRole($admin);
        Permission::create(['name' => 'Editar Materias'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Materias'])->assignRole($admin);

        Permission::create(['name' => 'Listar Modalidades'])->assignRole($admin);
        Permission::create(['name' => 'Crear Modalidades'])->assignRole($admin);
        Permission::create(['name' => 'Editar Modalidades'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Modalidades'])->assignRole($admin);

        Permission::create(['name' => 'Listar Metas'])->assignRole($admin);
        Permission::create(['name' => 'Crear Metas'])->assignRole($admin);
        Permission::create(['name' => 'Editar Metas'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Metas'])->assignRole($admin);

        Permission::create(['name' => 'Listar Motivos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Crear Motivos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Editar Motivos'])->syncRoles([$admin, $secre]);
        Permission::create(['name' => 'Eliminar Motivos'])->syncRoles([$admin, $secre]);

        Permission::create(['name' => 'Listar Niveles'])->assignRole($admin);
        Permission::create(['name' => 'Crear Niveles'])->assignRole($admin);
        Permission::create(['name' => 'Editar Niveles'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Niveles'])->assignRole($admin);

        Permission::create(['name' => 'Listar Temas'])->assignRole($admin);
        Permission::create(['name' => 'Crear Temas'])->assignRole($admin);
        Permission::create(['name' => 'Editar Temas'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Temas'])->assignRole($admin);

        Permission::create(['name' => 'Listar Roles'])->assignRole($admin);
        Permission::create(['name' => 'Crear Roles'])->assignRole($admin);
        Permission::create(['name' => 'Editar Roles'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Roles'])->assignRole($admin);

        Permission::create(['name' => 'Listar Preguntas'])->assignRole($admin);
        Permission::create(['name' => 'Crear Preguntas'])->assignRole($admin);
        Permission::create(['name' => 'Editar Preguntas'])->assignRole($admin);
        Permission::create(['name' => 'Eliminar Preguntas'])->assignRole($admin);

        Permission::create(['name' => 'Enviar Mensaje'])->assignRole($admin);

        $admin = User::find(1); 
        $admin->assignRole('Admin');
    }
}
