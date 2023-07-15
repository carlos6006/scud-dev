<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'nombre' => 'Nuevo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Actualización',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Corrección',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);



    }
}
