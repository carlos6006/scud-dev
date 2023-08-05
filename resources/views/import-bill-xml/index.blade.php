@extends('adminlte::page')

@section('title', 'Facturas de gastos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>@yield('title')</h1> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('sweetalert::alert')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <div class="callout callout-warning">
            <h5><i class="fas fa-info"></i> Nota:</h5>
            Para obtener el archivo .csv necesario para cargar el historial de viajes, te invito a <a class="text-primary"
                href="https://supplier.uber.com/orgs/45641fb1-ba1b-4974-8167-47f7d2892c62/reports" target="_blank">visitar
                la siguiente página</a>.
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-7">
                                    <h2 class="mb-1 text-primary"><i class="fas fa-money-bill"></i> @yield('title')</h2>
                                    <div class="text-muted fw-bold">
                                        {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $importBillXmls->total() !!}
                                        registros
                                    </div>
                                </div>

                                <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    <form action="{{ route('import-bills-xmls.import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="d-flex align-items-center">
                                            <!-- Contenedor flexbox -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-primary" type="submit"
                                                        id="inputGroupFileAddon04">
                                                        <i class="fas fa-upload"></i> {{ __('Importar Archivo') }}
                                                    </button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="xml_file"
                                                        id="xml_file" accept=".xml" onchange="updateFilePath()" required>
                                                    <label class="custom-file-label" for="xml_file">Elija el archivo</label>
                                                </div>
                                            </div>
                                            <div class="btn-group ml-3" role="group">
                                                <!-- Ajustamos el espaciado con la clase "ml-3" -->
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-download"></i> Exportar
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-file-csv"></i>
                                                        Exportar CVS</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>
                                                        Exportar PDF</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead">
                                        <tr>
                                            <th style="white-space: nowrap;">No</th>
                                            <th style="white-space: nowrap;">Comprobante Certificado</th>
                                            <th style="white-space: nowrap;">Comprobante Exportacion</th>
                                            <th style="white-space: nowrap;">Comprobante Fecha</th>
                                            <th style="white-space: nowrap;">Comprobante Folio</th>
                                            <th style="white-space: nowrap;">Comprobante Formapago</th>
                                            <th style="white-space: nowrap;">Comprobante Metodopago</th>
                                            <th style="white-space: nowrap;">Comprobante Lugarexpedicion</th>
                                            <th style="white-space: nowrap;">Comprobante Moneda</th>
                                            <th style="white-space: nowrap;">Comprobante Nocertificado</th>
                                            <th style="white-space: nowrap;">Comprobante Sello</th>
                                            <th style="white-space: nowrap;">Comprobante Serie</th>
                                            <th style="white-space: nowrap;">Comprobante Subtotal</th>
                                            <th style="white-space: nowrap;">Comprobante Tipodecomprobante</th>
                                            <th style="white-space: nowrap;">Comprobante Total</th>
                                            <th style="white-space: nowrap;">Comprobante Version</th>
                                            <th style="white-space: nowrap;">Emisor Rfc</th>
                                            <th style="white-space: nowrap;">Emisor Regimenfiscal</th>
                                            <th style="white-space: nowrap;">Emisor Nombre</th>
                                            <th style="white-space: nowrap;">Receptor Domiciliofiscal</th>
                                            <th style="white-space: nowrap;">Receptor Nombre</th>
                                            <th style="white-space: nowrap;">Receptor Regimenfiscal</th>
                                            <th style="white-space: nowrap;">Receptor Rfc</th>
                                            <th style="white-space: nowrap;">Receptor Usocfdi</th>
                                            <th style="white-space: nowrap;">Concepto Cantidad</th>
                                            <th style="white-space: nowrap;">Concepto Claveprodserv</th>
                                            <th style="white-space: nowrap;">Concepto Claveunidad</th>
                                            <th style="white-space: nowrap;">Concepto Descripcion</th>
                                            <th style="white-space: nowrap;">Concepto Importe</th>
                                            <th style="white-space: nowrap;">Concepto Noidentificacion</th>
                                            <th style="white-space: nowrap;">Concepto Objetoimp</th>
                                            <th style="white-space: nowrap;">Concepto Unidad</th>
                                            <th style="white-space: nowrap;">Concepto Valorunitario</th>
                                            <th style="white-space: nowrap;">Traslado Base</th>
                                            <th style="white-space: nowrap;">Traslado Importe</th>
                                            <th style="white-space: nowrap;">Traslado Impuesto</th>
                                            <th style="white-space: nowrap;">Traslado Tasaocuota</th>
                                            <th style="white-space: nowrap;">Traslado Tipofactor</th>
                                            <th style="white-space: nowrap;">Tfd Fechatimbrado</th>
                                            <th style="white-space: nowrap;">Tfd Nocertificadosat</th>
                                            <th style="white-space: nowrap;">Tfd Rfcprovcertif</th>
                                            <th style="white-space: nowrap;">Tfd Sellocfd</th>
                                            <th style="white-space: nowrap;">Tfd Sellosat</th>
                                            <th style="white-space: nowrap;">Tfd Uuid</th>
                                            <th style="white-space: nowrap;">Tfd Version</th>

                                            <th style="white-space: nowrap;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($importBillXmls as $importBillXml)
                                            <tr>
                                                <td style="white-space: nowrap;">{{ ++$i }}</td>

                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_Certificado }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_Exportacion }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Fecha }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Folio }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_FormaPago }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_MetodoPago }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_LugarExpedicion }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Moneda }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_NoCertificado }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Sello }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Serie }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_SubTotal }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Comprobante_TipoDeComprobante }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Total }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Version }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Emisor_RFC }}</td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Emisor_RegimenFiscal }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Emisor_Nombre }}</td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Receptor_DomicilioFiscal }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Receptor_Nombre }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Receptor_RegimenFiscal }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Receptor_RFC }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Receptor_UsoCFDI }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Concepto_Cantidad }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Concepto_ClaveProdServ }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Concepto_ClaveUnidad }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Concepto_Descripcion }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Concepto_Importe }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Concepto_NoIdentificacion }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Concepto_ObjetoImp }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Concepto_Unidad }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Concepto_ValorUnitario }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Traslado_Base }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Traslado_Importe }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Traslado_Impuesto }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Traslado_TasaOCuota }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Traslado_TipoFactor }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Tfd_FechaTimbrado }}
                                                </td>
                                                <td style="white-space: nowrap;">
                                                    {{ $importBillXml->Tfd_NoCertificadoSAT }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Tfd_RfcProvCertif }}
                                                </td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Tfd_SelloCFD }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Tfd_SelloSAT }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Tfd_UUID }}</td>
                                                <td style="white-space: nowrap;">{{ $importBillXml->Tfd_Version }}</td>

                                                <td style="white-space: nowrap;">
                                                    <form
                                                        action="{{ route('import-bill-xmls.destroy', $importBillXml->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('import-bill-xmls.show', $importBillXml->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('import-bill-xmls.edit', $importBillXml->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i>
                                                            {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer ">
                        {!! $importBillXmls->links() !!}
                    </div>
                </div>
            </div>
        </div>
    @stop

@section('footer')
    @include('footer')
@stop

@section('css')

@stop

@section('js')
<script>
    function updateFilePath() {
        var inputFile = document.querySelector('.custom-file-input');
        var fileName = inputFile.files[0].name;
        var filePathLabel = document.querySelector('.custom-file-label');
        filePathLabel.textContent = fileName;
    }
</script>
@stop
