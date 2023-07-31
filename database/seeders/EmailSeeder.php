<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $data = [
            [
                'first_name' => 'ALUMNO',
                'last_name' => 'PRUEBA',
                'rfc' => 'XEXT990101NI4',
                'email_address' => 'alumno.prueba@uvp.edu.mx',
                'status' => 'active',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'JUAN CARLOS',
                'last_name' => 'ALVAREZ SARTILLO',
                'rfc' => 'AASJ891002EW8',
                'email_address' => 'carlos.alvarez@uvp.edu.mx',
                'status' => 'active',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'DANIEL',
                'last_name' => 'CRUZ ALEJANDRO',
                'rfc' => 'CUAD880815C50',
                'email_address' => 'daniel.cruz@uvp.edu.mx',
                'status' => 'active',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],


            // Puedes agregar más registros aquí según tus necesidades
        ];

        // Utiliza la transacción para asegurar que todos los registros se agreguen correctamente
        DB::table('emails')->insert($data);




        // $faker = \Faker\Factory::create();

        // for ($i = 0; $i < 20; $i++) {
        //     DB::table('emails')->insert([
        //         'first_name' => $faker->firstName,
        //         'last_name' => $faker->lastName,
        //         'rfc' => $faker->regexify('[A-Z]{4}\d{6}[A-Z0-9]{3}'),
        //         'email_address' => $faker->unique()->safeEmail,
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('password'),
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
       // }
    }
}
