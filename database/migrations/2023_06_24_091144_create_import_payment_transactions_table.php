<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('import_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('identificador_transaccion')->nullable();
            $table->string('identificador_socio_app')->nullable();
            $table->string('nombre_socio_app')->nullable();
            $table->string('apellido_socio_app')->nullable();
            $table->string('identificador_viaje')->nullable();
            $table->string('descripcion',250)->nullable();
            $table->string('nombre_organizacion')->nullable();
            $table->string('alias_organizacion')->nullable();
            $table->string('vs_informes')->nullable();
            $table->float('recibes')->nullable();
            $table->float('recibes_tus_ganancias')->nullable();
            $table->float('recibes_saldo_viajes_pagos_efectivo')->nullable();
            $table->float('recibes_tus_ganancias_tarifa')->nullable();
            $table->float('recibes_tus_ganancias_impuestos')->nullable();
            $table->float('recibes_tus_ganancias_retencion_isr')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_tarifa')->nullable();
            $table->float('recibes_tus_ganancias_impuesto_servicio')->nullable();
            $table->float('recibes_tus_ganancias_retencion_iva')->nullable();
            $table->float('recibes_saldo_viajes_iva_tarifas_contribuciones')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_ajuste')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_dinamica')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_espera_recoleccion')->nullable();
            $table->float('recibes_saldo_viajes_pagos_transferencia_bancaria')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_cancelacion')->nullable();
            $table->float('recibes_tus_ganancias_promocion_desafio')->nullable();
            $table->float('recibes_saldo_viajes_impuestos_iva_servicio')->nullable();
            $table->float('recibes_tus_ganancias_extra_gratificacion_usuario')->nullable();
            $table->float('recibes_tus_ganancias_promocion_turbo')->nullable();
            $table->float('recibes_tus_ganancias_otras_tarifas_ajuste')->nullable();
            $table->float('recibes_ajustes_posteriores_viaje')->nullable();
            $table->float('recibes_saldo_viajes_gastos_peaje')->nullable();
            $table->float('recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_base')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_base_iva')->nullable();
            $table->float('recibes_saldo_viajes_reembolsos_peaje')->nullable();
            $table->float('recibes_tus_ganancias_otras_ganancias_ajuste')->nullable();
            $table->float('recibes_tus_ganancias_promocion_ganancia_referir')->nullable();
            $table->float('recibes_tus_ganancias_impuestos_retencion')->nullable();
            $table->float('recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_payment_transactions');
    }
};
