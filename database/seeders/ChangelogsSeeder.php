<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChangelogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('changelogs')->insert([
            [
                'user_id' =>1,
                'version' => '1.00',
                'type_id' => 1,
                'descripcion' => 'Bootstrap v5.2 framework integration - Preview.',
                'categori_id' => 1,
                'fecha_actualizacion' => '2023-05-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' =>1,
                'version' => '1.00',
                'type_id' => 1,
                'descripcion' => 'Brand new Demo 1, Demo 2 and Demo 3.',
                'fecha_actualizacion' => '2023-05-25',
                'categori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' =>1,
                'version' => '1.00',
                'type_id' => 1,
                'descripcion' => 'New unified core framework based on Bootstrap 5 using HTML, SASS, Javascript, Webpack, Gulp.',
                'fecha_actualizacion' => '2023-05-25',
                'categori_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
