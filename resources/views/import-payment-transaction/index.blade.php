@extends('adminlte::page')

@section('title', 'Historial de viajes')

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
                                    <h2 class="mb-1 text-primary"><i class="fas fa-road"></i> @yield('title')</h2>
                                    <div class="text-muted fw-bold">
                                        {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $importPaymentTransactions->total() !!}
                                        registros
                                    </div>
                                </div>
                                <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    <form action="{{ route('import-payment-transaction.import') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      @method('POST')
                                      <div class="d-flex align-items-center"> <!-- Contenedor flexbox -->
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">
                                              <i class="fas fa-upload"></i> {{ __('Importar Archivo') }}
                                            </button>
                                          </div>
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="csv_file" id="csv_file" accept=".csv" onchange="updateFilePath()" required data-browse="Español" lang="es">
                                            <label class="custom-file-label" for="csv_file">Elija el archivo</label>
                                          </div>
                                        </div>
                                        <div class="btn-group ml-3" role="group"> <!-- Ajustamos el espaciado con la clase "ml-3" -->
                                          <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i> Exportar
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="#"><i class="fas fa-file-csv"></i> Exportar CVS</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" namne="table" class="table table-striped">
                            <thead class="thead">
                                <tr>
                                    <th style="white-space: nowrap;">No</th>
                                    <th style="white-space: nowrap;" class="d-none d-md-table-cell">Identificador
                                        Transaccion</th>
                                    <th style="white-space: nowrap;">Identificador Socio App</th>
                                    <th style="white-space: nowrap;">Nombre Socio App</th>
                                    <th style="white-space: nowrap;">Apellido Socio App</th>
                                    <th style="white-space: nowrap;">Identificador Viaje</th>
                                    <th style="white-space: nowrap;">Descripcion</th>
                                    <th style="white-space: nowrap;">Nombre Organizacion</th>
                                    <th style="white-space: nowrap;">Alias Organizacion</th>
                                    <th style="white-space: nowrap;">Vs Informes</th>
                                    <th style="white-space: nowrap;">Recibes</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias</th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Pagos Efectivo</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Impuestos</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Retencion Isr</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Tarifa</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Impuesto Servicio</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Retencion Iva</th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Iva Tarifas Contribuciones
                                    </th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Ajuste</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Dinamica</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Espera Recoleccion
                                    </th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Pagos Transferencia Bancaria
                                    </th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Cancelacion</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Promocion Desafio</th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Impuestos Iva Servicio</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Extra Gratificacion Usuario
                                    </th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Promocion Turbo</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Otras Tarifas Ajuste</th>
                                    <th style="white-space: nowrap;">Recibes Ajustes Posteriores Viaje</th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Gastos Peaje</th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Reembolsos Deposito Validacion
                                        Cuenta</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Base</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Base Iva</th>
                                    <th style="white-space: nowrap;">Recibes Saldo Viajes Reembolsos Peaje</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Otras Ganancias Ajuste</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Promocion Ganancia Referir
                                    </th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Impuestos Retencion</th>
                                    <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Cancelacion Extra
                                        Espera Adicional</th>

                                    <th style="white-space: nowrap;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($importPaymentTransactions as $importPaymentTransaction)
                                    <tr>
                                        <td style="white-space: nowrap;">{{ ++$i }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->identificador_transaccion }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->identificador_socio_app }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->nombre_socio_app }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->apellido_socio_app }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->identificador_viaje }}</td>
                                        <td style="white-space: nowrap;">{{ $importPaymentTransaction->descripcion }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->nombre_organizacion }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->alias_organizacion }}</td>
                                        <td style="white-space: nowrap;">{{ $importPaymentTransaction->vs_informes }}
                                        </td>
                                        <td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_pagos_efectivo }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_impuestos }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_retencion_isr }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_tarifa }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_impuesto_servicio }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_retencion_iva }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_iva_tarifas_contribuciones }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_ajuste }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_dinamica }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_espera_recoleccion }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_pagos_transferencia_bancaria }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_promocion_desafio }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_impuestos_iva_servicio }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_extra_gratificacion_usuario }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_promocion_turbo }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_otras_tarifas_ajuste }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_ajustes_posteriores_viaje }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_gastos_peaje }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_base }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_base_iva }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_saldo_viajes_reembolsos_peaje }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_otras_ganancias_ajuste }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_promocion_ganancia_referir }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_impuestos_retencion }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            {{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional }}
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <form
                                                action="{{ route('import-payment-transaction.destroy', $importPaymentTransaction->id) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('import-payment-transaction.show', $importPaymentTransaction->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('import-payment-transaction.edit', $importPaymentTransaction->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer ">
                    {!! $importPaymentTransactions->links() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.5.0
    </div>
    <strong>Copyright &copy; 2023-2024 <a href="https://scud.com.mx">ScudLTE.com.mx</a>.</strong> Reservados todos los
    derechos.
@stop
<!-- Aquí puedes agregar el resto del código HTML que proporcionaste -->

<!-- Agregar la sección CSS para definir los estilos personalizados -->
@section('css')
<style>

$custom-file-text: (
  en: "Browse",
  es: "Elegir"
);

.custom-file-label::after {
  content: map-get($custom-file-text, es); /* Selecciona el idioma que desees aquí */
}


</style>
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
