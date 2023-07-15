<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $importPaymentTransaction->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identificador_transaccion') }}
            {{ Form::text('identificador_transaccion', $importPaymentTransaction->identificador_transaccion, ['class' => 'form-control' . ($errors->has('identificador_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Identificador Transaccion']) }}
            {!! $errors->first('identificador_transaccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identificador_socio_app') }}
            {{ Form::text('identificador_socio_app', $importPaymentTransaction->identificador_socio_app, ['class' => 'form-control' . ($errors->has('identificador_socio_app') ? ' is-invalid' : ''), 'placeholder' => 'Identificador Socio App']) }}
            {!! $errors->first('identificador_socio_app', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_socio_app') }}
            {{ Form::text('nombre_socio_app', $importPaymentTransaction->nombre_socio_app, ['class' => 'form-control' . ($errors->has('nombre_socio_app') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Socio App']) }}
            {!! $errors->first('nombre_socio_app', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_socio_app') }}
            {{ Form::text('apellido_socio_app', $importPaymentTransaction->apellido_socio_app, ['class' => 'form-control' . ($errors->has('apellido_socio_app') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Socio App']) }}
            {!! $errors->first('apellido_socio_app', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('identificador_viaje') }}
            {{ Form::text('identificador_viaje', $importPaymentTransaction->identificador_viaje, ['class' => 'form-control' . ($errors->has('identificador_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Identificador Viaje']) }}
            {!! $errors->first('identificador_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $importPaymentTransaction->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_organizacion') }}
            {{ Form::text('nombre_organizacion', $importPaymentTransaction->nombre_organizacion, ['class' => 'form-control' . ($errors->has('nombre_organizacion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Organizacion']) }}
            {!! $errors->first('nombre_organizacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alias_organizacion') }}
            {{ Form::text('alias_organizacion', $importPaymentTransaction->alias_organizacion, ['class' => 'form-control' . ($errors->has('alias_organizacion') ? ' is-invalid' : ''), 'placeholder' => 'Alias Organizacion']) }}
            {!! $errors->first('alias_organizacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vs_informes') }}
            {{ Form::text('vs_informes', $importPaymentTransaction->vs_informes, ['class' => 'form-control' . ($errors->has('vs_informes') ? ' is-invalid' : ''), 'placeholder' => 'Vs Informes']) }}
            {!! $errors->first('vs_informes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes') }}
            {{ Form::text('recibes', $importPaymentTransaction->recibes, ['class' => 'form-control' . ($errors->has('recibes') ? ' is-invalid' : ''), 'placeholder' => 'Recibes']) }}
            {!! $errors->first('recibes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias') }}
            {{ Form::text('recibes_tus_ganancias', $importPaymentTransaction->recibes_tus_ganancias, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias']) }}
            {!! $errors->first('recibes_tus_ganancias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_pagos_efectivo') }}
            {{ Form::text('recibes_saldo_viajes_pagos_efectivo', $importPaymentTransaction->recibes_saldo_viajes_pagos_efectivo, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_pagos_efectivo') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Pagos Efectivo']) }}
            {!! $errors->first('recibes_saldo_viajes_pagos_efectivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa') }}
            {{ Form::text('recibes_tus_ganancias_tarifa', $importPaymentTransaction->recibes_tus_ganancias_tarifa, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_impuestos') }}
            {{ Form::text('recibes_tus_ganancias_impuestos', $importPaymentTransaction->recibes_tus_ganancias_impuestos, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_impuestos') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Impuestos']) }}
            {!! $errors->first('recibes_tus_ganancias_impuestos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_retencion_isr') }}
            {{ Form::text('recibes_tus_ganancias_retencion_isr', $importPaymentTransaction->recibes_tus_ganancias_retencion_isr, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_retencion_isr') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Retencion Isr']) }}
            {!! $errors->first('recibes_tus_ganancias_retencion_isr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_tarifa') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_tarifa', $importPaymentTransaction->recibes_tus_ganancias_tarifa_tarifa, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_tarifa') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Tarifa']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_tarifa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_impuesto_servicio') }}
            {{ Form::text('recibes_tus_ganancias_impuesto_servicio', $importPaymentTransaction->recibes_tus_ganancias_impuesto_servicio, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_impuesto_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Impuesto Servicio']) }}
            {!! $errors->first('recibes_tus_ganancias_impuesto_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_retencion_iva') }}
            {{ Form::text('recibes_tus_ganancias_retencion_iva', $importPaymentTransaction->recibes_tus_ganancias_retencion_iva, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_retencion_iva') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Retencion Iva']) }}
            {!! $errors->first('recibes_tus_ganancias_retencion_iva', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_iva_tarifas_contribuciones') }}
            {{ Form::text('recibes_saldo_viajes_iva_tarifas_contribuciones', $importPaymentTransaction->recibes_saldo_viajes_iva_tarifas_contribuciones, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_iva_tarifas_contribuciones') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Iva Tarifas Contribuciones']) }}
            {!! $errors->first('recibes_saldo_viajes_iva_tarifas_contribuciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_ajuste') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_ajuste', $importPaymentTransaction->recibes_tus_ganancias_tarifa_ajuste, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_ajuste') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Ajuste']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_ajuste', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_dinamica') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_dinamica', $importPaymentTransaction->recibes_tus_ganancias_tarifa_dinamica, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_dinamica') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Dinamica']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_dinamica', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_espera_recoleccion') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_espera_recoleccion', $importPaymentTransaction->recibes_tus_ganancias_tarifa_espera_recoleccion, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_espera_recoleccion') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Espera Recoleccion']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_espera_recoleccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_pagos_transferencia_bancaria') }}
            {{ Form::text('recibes_saldo_viajes_pagos_transferencia_bancaria', $importPaymentTransaction->recibes_saldo_viajes_pagos_transferencia_bancaria, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_pagos_transferencia_bancaria') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Pagos Transferencia Bancaria']) }}
            {!! $errors->first('recibes_saldo_viajes_pagos_transferencia_bancaria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_cancelacion') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_cancelacion', $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_cancelacion') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Cancelacion']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_cancelacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_promocion_desafio') }}
            {{ Form::text('recibes_tus_ganancias_promocion_desafio', $importPaymentTransaction->recibes_tus_ganancias_promocion_desafio, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_promocion_desafio') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Promocion Desafio']) }}
            {!! $errors->first('recibes_tus_ganancias_promocion_desafio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_impuestos_iva_servicio') }}
            {{ Form::text('recibes_saldo_viajes_impuestos_iva_servicio', $importPaymentTransaction->recibes_saldo_viajes_impuestos_iva_servicio, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_impuestos_iva_servicio') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Impuestos Iva Servicio']) }}
            {!! $errors->first('recibes_saldo_viajes_impuestos_iva_servicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_extra_gratificacion_usuario') }}
            {{ Form::text('recibes_tus_ganancias_extra_gratificacion_usuario', $importPaymentTransaction->recibes_tus_ganancias_extra_gratificacion_usuario, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_extra_gratificacion_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Extra Gratificacion Usuario']) }}
            {!! $errors->first('recibes_tus_ganancias_extra_gratificacion_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_promocion_turbo') }}
            {{ Form::text('recibes_tus_ganancias_promocion_turbo', $importPaymentTransaction->recibes_tus_ganancias_promocion_turbo, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_promocion_turbo') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Promocion Turbo']) }}
            {!! $errors->first('recibes_tus_ganancias_promocion_turbo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_otras_tarifas_ajuste') }}
            {{ Form::text('recibes_tus_ganancias_otras_tarifas_ajuste', $importPaymentTransaction->recibes_tus_ganancias_otras_tarifas_ajuste, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_otras_tarifas_ajuste') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Otras Tarifas Ajuste']) }}
            {!! $errors->first('recibes_tus_ganancias_otras_tarifas_ajuste', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_ajustes_posteriores_viaje') }}
            {{ Form::text('recibes_ajustes_posteriores_viaje', $importPaymentTransaction->recibes_ajustes_posteriores_viaje, ['class' => 'form-control' . ($errors->has('recibes_ajustes_posteriores_viaje') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Ajustes Posteriores Viaje']) }}
            {!! $errors->first('recibes_ajustes_posteriores_viaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_gastos_peaje') }}
            {{ Form::text('recibes_saldo_viajes_gastos_peaje', $importPaymentTransaction->recibes_saldo_viajes_gastos_peaje, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_gastos_peaje') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Gastos Peaje']) }}
            {!! $errors->first('recibes_saldo_viajes_gastos_peaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta') }}
            {{ Form::text('recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta', $importPaymentTransaction->recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Reembolsos Deposito Validacion Cuenta']) }}
            {!! $errors->first('recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_base') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_base', $importPaymentTransaction->recibes_tus_ganancias_tarifa_base, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_base') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Base']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_base', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_base_iva') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_base_iva', $importPaymentTransaction->recibes_tus_ganancias_tarifa_base_iva, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_base_iva') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Base Iva']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_base_iva', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_saldo_viajes_reembolsos_peaje') }}
            {{ Form::text('recibes_saldo_viajes_reembolsos_peaje', $importPaymentTransaction->recibes_saldo_viajes_reembolsos_peaje, ['class' => 'form-control' . ($errors->has('recibes_saldo_viajes_reembolsos_peaje') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Saldo Viajes Reembolsos Peaje']) }}
            {!! $errors->first('recibes_saldo_viajes_reembolsos_peaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_otras_ganancias_ajuste') }}
            {{ Form::text('recibes_tus_ganancias_otras_ganancias_ajuste', $importPaymentTransaction->recibes_tus_ganancias_otras_ganancias_ajuste, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_otras_ganancias_ajuste') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Otras Ganancias Ajuste']) }}
            {!! $errors->first('recibes_tus_ganancias_otras_ganancias_ajuste', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_promocion_ganancia_referir') }}
            {{ Form::text('recibes_tus_ganancias_promocion_ganancia_referir', $importPaymentTransaction->recibes_tus_ganancias_promocion_ganancia_referir, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_promocion_ganancia_referir') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Promocion Ganancia Referir']) }}
            {!! $errors->first('recibes_tus_ganancias_promocion_ganancia_referir', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_impuestos_retencion') }}
            {{ Form::text('recibes_tus_ganancias_impuestos_retencion', $importPaymentTransaction->recibes_tus_ganancias_impuestos_retencion, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_impuestos_retencion') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Impuestos Retencion']) }}
            {!! $errors->first('recibes_tus_ganancias_impuestos_retencion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional') }}
            {{ Form::text('recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional', $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional, ['class' => 'form-control' . ($errors->has('recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional') ? ' is-invalid' : ''), 'placeholder' => 'Recibes Tus Ganancias Tarifa Cancelacion Extra Espera Adicional']) }}
            {!! $errors->first('recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>