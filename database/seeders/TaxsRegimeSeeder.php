<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxsRegimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regimenes = [
            ['clave' => '601', 'descripcion' => 'General de Ley Personas Morales', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '603', 'descripcion' => 'Personas Morales con Fines no Lucrativos', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '605', 'descripcion' => 'Sueldos y Salarios e Ingresos Asimilados a Salarios', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '606', 'descripcion' => 'Arrendamiento', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '607', 'descripcion' => 'Régimen de Enajenación o Adquisición de Bienes', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '608', 'descripcion' => 'Demás ingresos', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '609', 'descripcion' => 'Consolidación', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '610', 'descripcion' => 'Residentes en el Extranjero sin Establecimiento Permanente en México', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '611', 'descripcion' => 'Ingresos por Dividendos (socios y accionistas)', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '612', 'descripcion' => 'Personas Físicas con Actividades Empresariales y Profesionales', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '614', 'descripcion' => 'Ingresos por intereses', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '615', 'descripcion' => 'Régimen de los ingresos por obtención de premios', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '616', 'descripcion' => 'Sin obligaciones fiscales', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '620', 'descripcion' => 'Sociedades Cooperativas de Producción que optan por diferir sus ingresos', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '621', 'descripcion' => 'Incorporación Fiscal', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '622', 'descripcion' => 'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '623', 'descripcion' => 'Opcional para Grupos de Sociedades', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '624', 'descripcion' => 'Coordinados', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '625', 'descripcion' => 'Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '626', 'descripcion' => 'Régimen Simplificado de Confianza', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '628', 'descripcion' => 'Hidrocarburos', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '629', 'descripcion' => 'De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => '630', 'descripcion' => 'Enajenación de acciones en bolsa de valores', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Insertar los datos en la tabla 'regimenes_fiscales'
        DB::table('tax_regimes')->insert($regimenes);
    }
    }
