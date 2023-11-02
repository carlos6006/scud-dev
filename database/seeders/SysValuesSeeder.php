<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SysValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systemName = 'SCUD Dev';
        $systemVersion = '1.5';

        DB::table('sys_values')->insert([
            [
                'setting_name' => 'Nombre del sistema',
                'value' => $systemName,
                'description' => 'Nombre del sistema SCUDLte',
                'last_updated' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_name' => 'Versión del sistema',
                'value' => $systemVersion,
                'description' => 'Versión actual del sistema SCUDLte',
                'last_updated' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'setting_name' => 'Idioma predeterminado',
                'value' => 'es_ES',
                'description' => 'Idioma por defecto del sistema SCUDLte',
                'last_updated' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más datos según tus necesidades
        ]);
    }
}
