@extends('adminlte::page')

@section('template_title')
    {{ $importPaymentTransaction->name ?? "{{ __('Show') Import Payment Transaction" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Import Payment Transaction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('import-payment-transaction.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $importPaymentTransaction->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Identificador Transaccion:</strong>
                            {{ $importPaymentTransaction->identificador_transaccion }}
                        </div>
                        <div class="form-group">
                            <strong>Identificador Socio App:</strong>
                            {{ $importPaymentTransaction->identificador_socio_app }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Socio App:</strong>
                            {{ $importPaymentTransaction->nombre_socio_app }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Socio App:</strong>
                            {{ $importPaymentTransaction->apellido_socio_app }}
                        </div>
                        <div class="form-group">
                            <strong>Identificador Viaje:</strong>
                            {{ $importPaymentTransaction->identificador_viaje }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $importPaymentTransaction->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Organizacion:</strong>
                            {{ $importPaymentTransaction->nombre_organizacion }}
                        </div>
                        <div class="form-group">
                            <strong>Alias Organizacion:</strong>
                            {{ $importPaymentTransaction->alias_organizacion }}
                        </div>
                        <div class="form-group">
                            <strong>Vs Informes:</strong>
                            {{ $importPaymentTransaction->vs_informes }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes:</strong>
                            {{ $importPaymentTransaction->recibes }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Pagos Efectivo:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_pagos_efectivo }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Impuestos:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_impuestos }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Retencion Isr:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_retencion_isr }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Tarifa:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_tarifa }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Impuesto Servicio:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_impuesto_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Retencion Iva:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_retencion_iva }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Iva Tarifas Contribuciones:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_iva_tarifas_contribuciones }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Ajuste:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_ajuste }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Dinamica:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_dinamica }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Espera Recoleccion:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_espera_recoleccion }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Pagos Transferencia Bancaria:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_pagos_transferencia_bancaria }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Cancelacion:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Promocion Desafio:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_promocion_desafio }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Impuestos Iva Servicio:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_impuestos_iva_servicio }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Extra Gratificacion Usuario:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_extra_gratificacion_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Promocion Turbo:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_promocion_turbo }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Otras Tarifas Ajuste:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_otras_tarifas_ajuste }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Ajustes Posteriores Viaje:</strong>
                            {{ $importPaymentTransaction->recibes_ajustes_posteriores_viaje }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Gastos Peaje:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_gastos_peaje }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Reembolsos Deposito Validacion Cuenta:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Base:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_base }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Base Iva:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_base_iva }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Saldo Viajes Reembolsos Peaje:</strong>
                            {{ $importPaymentTransaction->recibes_saldo_viajes_reembolsos_peaje }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Otras Ganancias Ajuste:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_otras_ganancias_ajuste }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Promocion Ganancia Referir:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_promocion_ganancia_referir }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Impuestos Retencion:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_impuestos_retencion }}
                        </div>
                        <div class="form-group">
                            <strong>Recibes Tus Ganancias Tarifa Cancelacion Extra Espera Adicional:</strong>
                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
