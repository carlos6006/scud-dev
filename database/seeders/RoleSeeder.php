<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Usuario_avanzado']);
        Role::create(['name' => 'Usuario']);
        Role::create(['name' => 'Contabilidad']);
        Role::create(['name' => 'Visor(solo lectura)']);
        Role::create(['name' => 'Operador']);
        Role::create(['name' => 'Rol_inactivo']);
    }
}
