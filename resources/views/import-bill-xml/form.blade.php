<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $importBillXml->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Certificado') }}
            {{ Form::text('Comprobante_Certificado', $importBillXml->Comprobante_Certificado, ['class' => 'form-control' . ($errors->has('Comprobante_Certificado') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Certificado']) }}
            {!! $errors->first('Comprobante_Certificado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Exportacion') }}
            {{ Form::text('Comprobante_Exportacion', $importBillXml->Comprobante_Exportacion, ['class' => 'form-control' . ($errors->has('Comprobante_Exportacion') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Exportacion']) }}
            {!! $errors->first('Comprobante_Exportacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Fecha') }}
            {{ Form::text('Comprobante_Fecha', $importBillXml->Comprobante_Fecha, ['class' => 'form-control' . ($errors->has('Comprobante_Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Fecha']) }}
            {!! $errors->first('Comprobante_Fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Folio') }}
            {{ Form::text('Comprobante_Folio', $importBillXml->Comprobante_Folio, ['class' => 'form-control' . ($errors->has('Comprobante_Folio') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Folio']) }}
            {!! $errors->first('Comprobante_Folio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_FormaPago') }}
            {{ Form::text('Comprobante_FormaPago', $importBillXml->Comprobante_FormaPago, ['class' => 'form-control' . ($errors->has('Comprobante_FormaPago') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Formapago']) }}
            {!! $errors->first('Comprobante_FormaPago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_MetodoPago') }}
            {{ Form::text('Comprobante_MetodoPago', $importBillXml->Comprobante_MetodoPago, ['class' => 'form-control' . ($errors->has('Comprobante_MetodoPago') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Metodopago']) }}
            {!! $errors->first('Comprobante_MetodoPago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_LugarExpedicion') }}
            {{ Form::text('Comprobante_LugarExpedicion', $importBillXml->Comprobante_LugarExpedicion, ['class' => 'form-control' . ($errors->has('Comprobante_LugarExpedicion') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Lugarexpedicion']) }}
            {!! $errors->first('Comprobante_LugarExpedicion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Moneda') }}
            {{ Form::text('Comprobante_Moneda', $importBillXml->Comprobante_Moneda, ['class' => 'form-control' . ($errors->has('Comprobante_Moneda') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Moneda']) }}
            {!! $errors->first('Comprobante_Moneda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_NoCertificado') }}
            {{ Form::text('Comprobante_NoCertificado', $importBillXml->Comprobante_NoCertificado, ['class' => 'form-control' . ($errors->has('Comprobante_NoCertificado') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Nocertificado']) }}
            {!! $errors->first('Comprobante_NoCertificado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Sello') }}
            {{ Form::text('Comprobante_Sello', $importBillXml->Comprobante_Sello, ['class' => 'form-control' . ($errors->has('Comprobante_Sello') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Sello']) }}
            {!! $errors->first('Comprobante_Sello', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Serie') }}
            {{ Form::text('Comprobante_Serie', $importBillXml->Comprobante_Serie, ['class' => 'form-control' . ($errors->has('Comprobante_Serie') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Serie']) }}
            {!! $errors->first('Comprobante_Serie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_SubTotal') }}
            {{ Form::text('Comprobante_SubTotal', $importBillXml->Comprobante_SubTotal, ['class' => 'form-control' . ($errors->has('Comprobante_SubTotal') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Subtotal']) }}
            {!! $errors->first('Comprobante_SubTotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_TipoDeComprobante') }}
            {{ Form::text('Comprobante_TipoDeComprobante', $importBillXml->Comprobante_TipoDeComprobante, ['class' => 'form-control' . ($errors->has('Comprobante_TipoDeComprobante') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Tipodecomprobante']) }}
            {!! $errors->first('Comprobante_TipoDeComprobante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Total') }}
            {{ Form::text('Comprobante_Total', $importBillXml->Comprobante_Total, ['class' => 'form-control' . ($errors->has('Comprobante_Total') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Total']) }}
            {!! $errors->first('Comprobante_Total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Comprobante_Version') }}
            {{ Form::text('Comprobante_Version', $importBillXml->Comprobante_Version, ['class' => 'form-control' . ($errors->has('Comprobante_Version') ? ' is-invalid' : ''), 'placeholder' => 'Comprobante Version']) }}
            {!! $errors->first('Comprobante_Version', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Emisor_RFC') }}
            {{ Form::text('Emisor_RFC', $importBillXml->Emisor_RFC, ['class' => 'form-control' . ($errors->has('Emisor_RFC') ? ' is-invalid' : ''), 'placeholder' => 'Emisor Rfc']) }}
            {!! $errors->first('Emisor_RFC', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Emisor_RegimenFiscal') }}
            {{ Form::text('Emisor_RegimenFiscal', $importBillXml->Emisor_RegimenFiscal, ['class' => 'form-control' . ($errors->has('Emisor_RegimenFiscal') ? ' is-invalid' : ''), 'placeholder' => 'Emisor Regimenfiscal']) }}
            {!! $errors->first('Emisor_RegimenFiscal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Emisor_Nombre') }}
            {{ Form::text('Emisor_Nombre', $importBillXml->Emisor_Nombre, ['class' => 'form-control' . ($errors->has('Emisor_Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Emisor Nombre']) }}
            {!! $errors->first('Emisor_Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Receptor_DomicilioFiscal') }}
            {{ Form::text('Receptor_DomicilioFiscal', $importBillXml->Receptor_DomicilioFiscal, ['class' => 'form-control' . ($errors->has('Receptor_DomicilioFiscal') ? ' is-invalid' : ''), 'placeholder' => 'Receptor Domiciliofiscal']) }}
            {!! $errors->first('Receptor_DomicilioFiscal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Receptor_Nombre') }}
            {{ Form::text('Receptor_Nombre', $importBillXml->Receptor_Nombre, ['class' => 'form-control' . ($errors->has('Receptor_Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Receptor Nombre']) }}
            {!! $errors->first('Receptor_Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Receptor_RegimenFiscal') }}
            {{ Form::text('Receptor_RegimenFiscal', $importBillXml->Receptor_RegimenFiscal, ['class' => 'form-control' . ($errors->has('Receptor_RegimenFiscal') ? ' is-invalid' : ''), 'placeholder' => 'Receptor Regimenfiscal']) }}
            {!! $errors->first('Receptor_RegimenFiscal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Receptor_RFC') }}
            {{ Form::text('Receptor_RFC', $importBillXml->Receptor_RFC, ['class' => 'form-control' . ($errors->has('Receptor_RFC') ? ' is-invalid' : ''), 'placeholder' => 'Receptor Rfc']) }}
            {!! $errors->first('Receptor_RFC', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Receptor_UsoCFDI') }}
            {{ Form::text('Receptor_UsoCFDI', $importBillXml->Receptor_UsoCFDI, ['class' => 'form-control' . ($errors->has('Receptor_UsoCFDI') ? ' is-invalid' : ''), 'placeholder' => 'Receptor Usocfdi']) }}
            {!! $errors->first('Receptor_UsoCFDI', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_Cantidad') }}
            {{ Form::text('Concepto_Cantidad', $importBillXml->Concepto_Cantidad, ['class' => 'form-control' . ($errors->has('Concepto_Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Cantidad']) }}
            {!! $errors->first('Concepto_Cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_ClaveProdServ') }}
            {{ Form::text('Concepto_ClaveProdServ', $importBillXml->Concepto_ClaveProdServ, ['class' => 'form-control' . ($errors->has('Concepto_ClaveProdServ') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Claveprodserv']) }}
            {!! $errors->first('Concepto_ClaveProdServ', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_ClaveUnidad') }}
            {{ Form::text('Concepto_ClaveUnidad', $importBillXml->Concepto_ClaveUnidad, ['class' => 'form-control' . ($errors->has('Concepto_ClaveUnidad') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Claveunidad']) }}
            {!! $errors->first('Concepto_ClaveUnidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_Descripcion') }}
            {{ Form::text('Concepto_Descripcion', $importBillXml->Concepto_Descripcion, ['class' => 'form-control' . ($errors->has('Concepto_Descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Descripcion']) }}
            {!! $errors->first('Concepto_Descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_Importe') }}
            {{ Form::text('Concepto_Importe', $importBillXml->Concepto_Importe, ['class' => 'form-control' . ($errors->has('Concepto_Importe') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Importe']) }}
            {!! $errors->first('Concepto_Importe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_NoIdentificacion') }}
            {{ Form::text('Concepto_NoIdentificacion', $importBillXml->Concepto_NoIdentificacion, ['class' => 'form-control' . ($errors->has('Concepto_NoIdentificacion') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Noidentificacion']) }}
            {!! $errors->first('Concepto_NoIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_ObjetoImp') }}
            {{ Form::text('Concepto_ObjetoImp', $importBillXml->Concepto_ObjetoImp, ['class' => 'form-control' . ($errors->has('Concepto_ObjetoImp') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Objetoimp']) }}
            {!! $errors->first('Concepto_ObjetoImp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_Unidad') }}
            {{ Form::text('Concepto_Unidad', $importBillXml->Concepto_Unidad, ['class' => 'form-control' . ($errors->has('Concepto_Unidad') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Unidad']) }}
            {!! $errors->first('Concepto_Unidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Concepto_ValorUnitario') }}
            {{ Form::text('Concepto_ValorUnitario', $importBillXml->Concepto_ValorUnitario, ['class' => 'form-control' . ($errors->has('Concepto_ValorUnitario') ? ' is-invalid' : ''), 'placeholder' => 'Concepto Valorunitario']) }}
            {!! $errors->first('Concepto_ValorUnitario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Traslado_Base') }}
            {{ Form::text('Traslado_Base', $importBillXml->Traslado_Base, ['class' => 'form-control' . ($errors->has('Traslado_Base') ? ' is-invalid' : ''), 'placeholder' => 'Traslado Base']) }}
            {!! $errors->first('Traslado_Base', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Traslado_Importe') }}
            {{ Form::text('Traslado_Importe', $importBillXml->Traslado_Importe, ['class' => 'form-control' . ($errors->has('Traslado_Importe') ? ' is-invalid' : ''), 'placeholder' => 'Traslado Importe']) }}
            {!! $errors->first('Traslado_Importe', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Traslado_Impuesto') }}
            {{ Form::text('Traslado_Impuesto', $importBillXml->Traslado_Impuesto, ['class' => 'form-control' . ($errors->has('Traslado_Impuesto') ? ' is-invalid' : ''), 'placeholder' => 'Traslado Impuesto']) }}
            {!! $errors->first('Traslado_Impuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Traslado_TasaOCuota') }}
            {{ Form::text('Traslado_TasaOCuota', $importBillXml->Traslado_TasaOCuota, ['class' => 'form-control' . ($errors->has('Traslado_TasaOCuota') ? ' is-invalid' : ''), 'placeholder' => 'Traslado Tasaocuota']) }}
            {!! $errors->first('Traslado_TasaOCuota', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Traslado_TipoFactor') }}
            {{ Form::text('Traslado_TipoFactor', $importBillXml->Traslado_TipoFactor, ['class' => 'form-control' . ($errors->has('Traslado_TipoFactor') ? ' is-invalid' : ''), 'placeholder' => 'Traslado Tipofactor']) }}
            {!! $errors->first('Traslado_TipoFactor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_FechaTimbrado') }}
            {{ Form::text('Tfd_FechaTimbrado', $importBillXml->Tfd_FechaTimbrado, ['class' => 'form-control' . ($errors->has('Tfd_FechaTimbrado') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Fechatimbrado']) }}
            {!! $errors->first('Tfd_FechaTimbrado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_NoCertificadoSAT') }}
            {{ Form::text('Tfd_NoCertificadoSAT', $importBillXml->Tfd_NoCertificadoSAT, ['class' => 'form-control' . ($errors->has('Tfd_NoCertificadoSAT') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Nocertificadosat']) }}
            {!! $errors->first('Tfd_NoCertificadoSAT', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_RfcProvCertif') }}
            {{ Form::text('Tfd_RfcProvCertif', $importBillXml->Tfd_RfcProvCertif, ['class' => 'form-control' . ($errors->has('Tfd_RfcProvCertif') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Rfcprovcertif']) }}
            {!! $errors->first('Tfd_RfcProvCertif', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_SelloCFD') }}
            {{ Form::text('Tfd_SelloCFD', $importBillXml->Tfd_SelloCFD, ['class' => 'form-control' . ($errors->has('Tfd_SelloCFD') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Sellocfd']) }}
            {!! $errors->first('Tfd_SelloCFD', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_SelloSAT') }}
            {{ Form::text('Tfd_SelloSAT', $importBillXml->Tfd_SelloSAT, ['class' => 'form-control' . ($errors->has('Tfd_SelloSAT') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Sellosat']) }}
            {!! $errors->first('Tfd_SelloSAT', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_UUID') }}
            {{ Form::text('Tfd_UUID', $importBillXml->Tfd_UUID, ['class' => 'form-control' . ($errors->has('Tfd_UUID') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Uuid']) }}
            {!! $errors->first('Tfd_UUID', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tfd_Version') }}
            {{ Form::text('Tfd_Version', $importBillXml->Tfd_Version, ['class' => 'form-control' . ($errors->has('Tfd_Version') ? ' is-invalid' : ''), 'placeholder' => 'Tfd Version']) }}
            {!! $errors->first('Tfd_Version', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>