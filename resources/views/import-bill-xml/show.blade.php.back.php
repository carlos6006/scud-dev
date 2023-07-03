@extends('adminlte::page')

@section('template_title')
    {{ $importBillXml->name ?? "{{ __('Show') Import Bill Xml" }}
@endsection

@section('content_header')
    <div class="container-fluid">
    </div>
@endsection

@section('content')
<div class="callout callout-warning">
<h5><i class="fas fa-info"></i> Nota:</h5>
Esta página ha sido mejorada para su impresión. Haga clic en el botón de impresión en la parte inferior de la factura para probar.
</div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="float-left">
                <span class="card-title">{{ __('FACTURA') }}</span>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('import-bill-xmls.index') }}"> {{ __('Regresar') }}</a>
            </div>
        </div>
        <div class="card-body">
                  <div class="row ">
                <div class="col-sm-6 ">
                    <div class="d-flex mt-3">
              <div class="d-flex justify-content-center align-items-center">
                <img src="http://127.0.0.1:8000/vendor/adminlte/dist/img/AdminLTELogo.png" alt="SCUD " height="50">
</div>
              <span class="app-brand-text demo text-body fw-bolder ml-2 mt-1">
                <h3 class="font-weight-bold mb-0">{{ $importBillXml->Emisor_Nombre }}</h3>
<div class="mb-0 text-muted">{{ $importBillXml->Emisor_RFC }}</div></span>
            </div>
                    <div class="mt-5 mb-0">
<p class="">
    <span class="font-weight-bold">Lugar de Expedición:
                            </span>{{ $importBillXml->Comprobante_LugarExpedicion }}<br>
                            <span class="font-weight-bold">Tipo de comprobante:
                            </span>{{ $importBillXml->Comprobante_TipoDeComprobante }}<br>

    </p>
</div>
                </div>

                <div class="col-sm-6">
                    <div class="card-body">
                        <p class="px-3 mb-2 bg-primary text-white">Folio Fiscal: <span class="font-weight-bold">
                                {{ $importBillXml->Tfd_UUID }}</span></p>

                        <span class="font-weight-bold">Folio: </span>{{ $importBillXml->Comprobante_Serie }} {{ $importBillXml->Comprobante_Folio }}<br>
                        <span class="font-weight-bold">Fecha y hora de emisión:
                        </span>{{ $importBillXml->Comprobante_Fecha }}<br>
                        <span class="font-weight-bold">No. Serie del Certificado del CSD: </span>
                        {{ $importBillXml->Comprobante_NoCertificado }}<br>
                        <span class="font-weight-bold">No. Serie del Certificado del SAT:
                        </span>{{ $importBillXml->Tfd_NoCertificado }}<br>
                        <span class="font-weight-bold">Fecha y hora de certificación:
                        </span>{{ $importBillXml->Tfd_FechaTimbrado }}<br>
                    </div>
                </div>
            </div>

            <p class="px-3 mb-2 bg-primary text-white text-center">RECEPTOR</span></p>
            <div class="col-sm-6"><b>{{ $importBillXml->Receptor_Nombre }} - {{ $importBillXml->Receptor_RFC }}</b><br>
            </div>
            <hr>
            <table class="table-responsive table-borderless">
                <thead class="bg-primary">
                    <tr>
                        <th class="col-1">CANT.</th>
                        <th class="col-1">UNIDAD</th>
                        <th class="col-8">DESCRIPCIÓN</th>
                        <th class="col-1">UNITARIO</th>
                        <th class="col-1">IMPORTE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{ number_format($importBillXml->Concepto_Cantidad, 2, '.', '') }}</td>
                        <td> {{ $importBillXml->Concepto_ClaveUnidad }}</td>
                        <td> {{ $importBillXml->Concepto_Descripcion }}</td>
                        <td>{{ number_format($importBillXml->Concepto_ValorUnitario, 2, '.', '') }}</td>
                        <td>{{ $importBillXml->Comprobante_SubTotal }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p class="font-weight-bold">Cantidad con letra: SEISCIENTOS SEIS PESOS 22/100 M.N.</p>
                            <span class="font-weight-bold">Forma de pago:
                            </span>{{ $importBillXml->Comprobante_FormaPago }}<br>
                            <span class="font-weight-bold">Método de pago:
                            </span>{{ $importBillXml->Comprobante_MetodoPago }}<br>
                        </td>
                        <td>
                            Subtotal:
                            <br>IVA 16%
                            <br>IVA 16%
                            <br><span class="font-weight-bold">Total: </span>
                        </td>
                        <td>
                            {{ $importBillXml->Comprobante_SubTotal }}
                            <br>{{ $importBillXml->Traslado_Importe }}
                            <br>{{ $importBillXml->Traslado_Importe }}
                            <br><span class="font-weight-bold">{{ $importBillXml->Comprobante_Total }}</span>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center align-middle">
                            <div class="visible-print >{!! QrCode::size(200)->generate(Request::url()) !!}</div>
        </td>
      <td style="
                                word-break: break-word;">
                                <div class="text-sm text-wrap">
                                    <br><b>Cadena original del complemento de certificación digital del
                                        SAT:</b><br>||{{ $importBillXml->Tfd_Version }}|{{ $importBillXml->Tfd_UUID }}|{{ $importBillXml->Tfd_FechaTimbrado }}|{{ $importBillXml->Comprobante_Sello }}|{{ $importBillXml->Tfd_NoCertificado }}||<br>
                                    <br>
                                    <b>Sello Digital del CFDI:</b><br>{{ $importBillXml->Comprobante_Sello }}<br>
                                    <br><b>Sello Digital del SAT:</b><br> {{ $importBillXml->Tfd_SelloSAT }}
                                </div>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>


        </div>
        <div class="card-footer text-muted">
            <div class="col-12">
                <a href="" rel="noopener" target="_blank" class="btn btn-default" onclick="window.print();"><i
                        class="fas fa-print"></i> Imprimir</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                </button>
            </div>
        </div>
    </div>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Import Bill Xml</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('import-bill-xmls.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $importBillXml->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Certificado:</strong>
                            {{ $importBillXml->Comprobante_Certificado }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Exportacion:</strong>
                            {{ $importBillXml->Comprobante_Exportacion }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Fecha:</strong>
                            {{ $importBillXml->Comprobante_Fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Folio:</strong>
                            {{ $importBillXml->Comprobante_Folio }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Formapago:</strong>
                            {{ $importBillXml->Comprobante_FormaPago }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Metodopago:</strong>
                            {{ $importBillXml->Comprobante_MetodoPago }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Lugarexpedicion:</strong>
                            {{ $importBillXml->Comprobante_LugarExpedicion }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Moneda:</strong>
                            {{ $importBillXml->Comprobante_Moneda }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Nocertificado:</strong>
                            {{ $importBillXml->Comprobante_NoCertificado }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Sello:</strong>
                            {{ $importBillXml->Comprobante_Sello }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Serie:</strong>
                            {{ $importBillXml->Comprobante_Serie }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Subtotal:</strong>
                            {{ $importBillXml->Comprobante_SubTotal }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Tipodecomprobante:</strong>
                            {{ $importBillXml->Comprobante_TipoDeComprobante }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Total:</strong>
                            {{ $importBillXml->Comprobante_Total }}
                        </div>
                        <div class="form-group">
                            <strong>Comprobante Version:</strong>
                            {{ $importBillXml->Comprobante_Version }}
                        </div>
                        <div class="form-group">
                            <strong>Emisor Rfc:</strong>
                            {{ $importBillXml->Emisor_RFC }}
                        </div>
                        <div class="form-group">
                            <strong>Emisor Regimenfiscal:</strong>
                            {{ $importBillXml->Emisor_RegimenFiscal }}
                        </div>
                        <div class="form-group">
                            <strong>Emisor Nombre:</strong>
                            {{ $importBillXml->Emisor_Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Receptor Domiciliofiscal:</strong>
                            {{ $importBillXml->Receptor_DomicilioFiscal }}
                        </div>
                        <div class="form-group">
                            <strong>Receptor Nombre:</strong>
                            {{ $importBillXml->Receptor_Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Receptor Regimenfiscal:</strong>
                            {{ $importBillXml->Receptor_RegimenFiscal }}
                        </div>
                        <div class="form-group">
                            <strong>Receptor Rfc:</strong>
                            {{ $importBillXml->Receptor_RFC }}
                        </div>
                        <div class="form-group">
                            <strong>Receptor Usocfdi:</strong>
                            {{ $importBillXml->Receptor_UsoCFDI }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Cantidad:</strong>
                            {{ $importBillXml->Concepto_Cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Claveprodserv:</strong>
                            {{ $importBillXml->Concepto_ClaveProdServ }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Claveunidad:</strong>
                            {{ $importBillXml->Concepto_ClaveUnidad }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Descripcion:</strong>
                            {{ $importBillXml->Concepto_Descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Importe:</strong>
                            {{ $importBillXml->Concepto_Importe }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Noidentificacion:</strong>
                            {{ $importBillXml->Concepto_NoIdentificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Objetoimp:</strong>
                            {{ $importBillXml->Concepto_ObjetoImp }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Unidad:</strong>
                            {{ $importBillXml->Concepto_Unidad }}
                        </div>
                        <div class="form-group">
                            <strong>Concepto Valorunitario:</strong>
                            {{ $importBillXml->Concepto_ValorUnitario }}
                        </div>
                        <div class="form-group">
                            <strong>Traslado Base:</strong>
                            {{ $importBillXml->Traslado_Base }}
                        </div>
                        <div class="form-group">
                            <strong>Traslado Importe:</strong>
                            {{ $importBillXml->Traslado_Importe }}
                        </div>
                        <div class="form-group">
                            <strong>Traslado Impuesto:</strong>
                            {{ $importBillXml->Traslado_Impuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Traslado Tasaocuota:</strong>
                            {{ $importBillXml->Traslado_TasaOCuota }}
                        </div>
                        <div class="form-group">
                            <strong>Traslado Tipofactor:</strong>
                            {{ $importBillXml->Traslado_TipoFactor }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Fechatimbrado:</strong>
                            {{ $importBillXml->Tfd_FechaTimbrado }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Nocertificadosat:</strong>
                            {{ $importBillXml->Tfd_NoCertificadoSAT }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Rfcprovcertif:</strong>
                            {{ $importBillXml->Tfd_RfcProvCertif }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Sellocfd:</strong>
                            {{ $importBillXml->Tfd_SelloCFD }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Sellosat:</strong>
                            {{ $importBillXml->Tfd_SelloSAT }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Uuid:</strong>
                            {{ $importBillXml->Tfd_UUID }}
                        </div>
                        <div class="form-group">
                            <strong>Tfd Version:</strong>
                            {{ $importBillXml->Tfd_Version }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
