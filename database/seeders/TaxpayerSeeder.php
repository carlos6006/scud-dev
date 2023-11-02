<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxpayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tax_payers')->insert([
            'users_id' => 1, // Reemplaza con el ID de usuario correspondiente
            'tax_id_number' => 'AASJ891002EW8', // Reemplaza con el número de identificación fiscal
            'legal_name_or_business_name' => 'JUAN CARLOS ALVAREZ SARTILLO', // Reemplaza con el nombre o razón social
            'address_street' => '123 Main Street', // Reemplaza con la dirección
            'address_number' => '456',
            'address_neighborhood' => 'Downtown',
            'address_city' => 'MEXICO',
            'address_state' => 'PUEBLA',
            'postal_code' => '74125',
            'taxpayer_type' => 'Legal Entity', // Reemplaza con el tipo de contribuyente
            'tax_regimes_id' => 19, // Reemplaza con el ID del régimen fiscal correspondiente
            'phone' => '555-123-4567', // Reemplaza con el número de teléfono
            'email' => 'example@example.com', // Reemplaza con la dirección de correo electrónico
            'start_of_operations' => '2023-01-01', // Reemplaza con la fecha de inicio de operaciones
            'tax_registration' => 'TAX123', // Reemplaza con el número de registro de Hacienda
            'economic_activity' => 'Retail', // Reemplaza con la actividad económica
        ]);
    }
}
