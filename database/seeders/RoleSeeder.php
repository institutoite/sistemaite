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

        Permission::create(['name' => 'Listar Horarios']);
        Permission::create(['name' => 'Crear Horarios']);
        Permission::create(['name' => 'Editar Horarios']);
        Permission::create(['name' => 'Eliminar Horarios']);
    }
}
