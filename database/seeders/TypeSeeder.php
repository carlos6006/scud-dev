<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Tipo::create([
            'nombre' => 'new',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Tipo::create([
            'nombre' => 'update',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Tipo::create([
            'nombre' => 'fix',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
