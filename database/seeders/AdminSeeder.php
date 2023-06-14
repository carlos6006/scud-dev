<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            $Admin=Role::create(['name'=>"Admin"]);
            $Supervisor=Role::create(['name' => 'Supervisor']);
            $Cliente=Role::create(['name' => 'Cliente']);

        $modulos=[
            'usuarios',
            'roles',
            'resúmenes',
            'clientes',
            'facturas',
            'productos',
            'informes',
            'configuración',
            'perfiles',
            'permisos',
            'categorías',
            'mensajes',
            'notificaciones',
            'tareas',
            'gastos',
            'ingresos',
            'factura_global',
            'permisos_avanzados',
            'suscripciones',
            'estadísticas administrador',
            'estadísticas supervisor',
            'estadísticas_cliente',
            'declaración'
        ];

        $permissions = [
            'create',
            'read',
            'update',
            'delete'
        ];

        foreach($modulos as $m){
            foreach($permissions as $p){
                Permission::create(['name' => "{$m} $p"]);
            }
        }


        $Admin->syncPermissions(Permission::all());

        $user=User::create([
            'name' => 'Juan Carlos Alvarez Sartillo',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('Admin');


        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            $name = $faker->name;
            $email = $faker->unique()->safeEmail;
        $user=User::create([
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $array1 = ['Cliente','Supervisor'];

        $user->assignRole(Arr::random($array1));

    }}
}
