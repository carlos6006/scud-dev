<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('import_payment_transactions')->insert([
            'users_id'=>1,
            'identificador_transaccion' => '8043709e-7042-3013-8184-ca3cc0c1183e',
            'identificador_socio_app' => '45641fb1-ba1b-4974-8167-47f7d2892c62',
            'nombre_socio_app' => 'Juan Carlos',
            'apellido_socio_app' => 'Alvarez Sartillo',
            'identificador_viaje' => 'c29006a1-4bb3-44e4-9b18-662a2f8df198',
            'descripcion' => 'trip completed order',
            'nombre_organizacion' => 'Juan Carlos Alvarez Sartillo',
            'alias_organizacion' => 'Juan CarlosAlvarez Sartillo',
            'vs_informes' => '2023-01-01 16:50:10.475 -0600 CST',
            'recibes' => -0.07,
            'recibes_tus_ganancias' => 49.92,
            'recibes_saldo_viajes_pagos_efectivo' => -59.02,
            'recibes_tus_ganancias_tarifa' => 51.38,
            'recibes_tus_ganancias_impuestos' => 0,
            'recibes_tus_ganancias_retencion_isr' => 0,
            'recibes_tus_ganancias_tarifa_tarifa' => 52.27,
            'recibes_tus_ganancias_impuesto_servicio' => -1.46,
            'recibes_tus_ganancias_retencion_iva' => 0,
            'recibes_saldo_viajes_iva_tarifas_contribuciones' => 9.03,
            'recibes_tus_ganancias_tarifa_ajuste' => -0.89,
            'recibes_tus_ganancias_tarifa_dinamica' => 0,
            'recibes_tus_ganancias_tarifa_espera_recoleccion' => 0,
            'recibes_saldo_viajes_pagos_transferencia_bancaria' => 0,
            'recibes_tus_ganancias_tarifa_cancelacion' => 0,
            'recibes_tus_ganancias_promocion_desafio' => 0,
            'recibes_saldo_viajes_impuestos_iva_servicio' => 0,
            'recibes_tus_ganancias_extra_gratificacion_usuario' => 0,
            'recibes_tus_ganancias_promocion_turbo' => 0,
            'recibes_tus_ganancias_otras_tarifas_ajuste' => 0,
            'recibes_ajustes_posteriores_viaje' => 0,
            'recibes_saldo_viajes_gastos_peaje' => 0,
            'recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta' => 0,
            'recibes_tus_ganancias_tarifa_base' => 0,
            'recibes_tus_ganancias_tarifa_base_iva' => 0,
            'recibes_saldo_viajes_reembolsos_peaje' => 0,
            'recibes_tus_ganancias_otras_ganancias_ajuste' => 0,
            'recibes_tus_ganancias_promocion_ganancia_referir' => 0,
            'recibes_tus_ganancias_impuestos_retencion' => 0,
            'recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional' => 0,
            //'email' => Str::random(10).'@gmail.com',
            //'password' => Hash::make('password'),
        ]);
    }

}
