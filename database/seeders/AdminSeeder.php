<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Faker\Factory as Faker;



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
            'declaracion_mesnual',
            'resumenes',
            'factura_global',
            'importar-gastosXML',
            'importar-ingresosXML',
            'importar-retencionesXML',
            'importar-historial_de_viajesCSV',
            'configuracion-perfil',
            'configuracion-financiera',
            'suscirpciones-clientes',
            'suscirpciones-cuentas bancarias',
            'gestion_usuarios-usuarios',
            'gestion_usuarios-roles_de_usuario',
            'gestion_usuarios-permisos',
            'componentes',
            'documentacion',
            'changelog',
            'changelog-tipos',
            'changelog-categorias',
        ];

        $permissions = [
            'read',
            'write',
            'create'
        ];
        $faker = Faker::create();
        foreach($modulos as $m){
            // foreach($permissions as $p){
                Permission::create([
                    'name' => $m,
                    'description' => $faker->sentence(), // Generar una descripción aleatoria
                ]);
                // Permission::create(['name' => "{$m}.$p"]);
            // }
        }


        $Admin->syncPermissions(Permission::all());

        $user=User::create([
            'name' => 'Juan Carlos Alvarez Sartillo',
            'email' => 'admin@admin.com',
            'activo' => '1',
            //'email_verified_at' => now(),
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
            'activo'=>'1',
            //'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $array1 = ['Cliente','Supervisor'];

        $user->assignRole(Arr::random($array1));

    }}
}
