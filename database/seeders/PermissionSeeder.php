<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'ver_usuarios']);
        Permission::create(['name' => 'ver_roles']);
        Permission::create(['name' => 'crear_roles']);
        Permission::create(['name' => 'crear_usuarios']);
        Permission::create(['name' => 'editar_roles']);
        Permission::create(['name' => 'editar_usuarios']);
        Permission::create(['name' => 'eliminar_usuarios']);
        Permission::create(['name' => 'eliminar_roless']);

    }
}
