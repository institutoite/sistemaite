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
        $admin= Role::create(['name' => 'Admin']);
        $secretary= Role::create(['name' => 'Secretary']);
        $teacher= Role::create(['name' => 'Teacher']);
        $student= Role::create(['name' => 'Student']);

        Permission::create(['name' => 'schedule.index'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'schedule.crear'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'schedule'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'schedule'])->syncRoles([$admin, $teacher]);
        Permission::create(['name' => 'schedule'])->syncRoles([$admin, $teacher]);
    }
}
