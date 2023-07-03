@extends('adminlte::page')

@section('title', 'Import Payment Transaction')

@section('content_header')
<div class="container-fluid">
    </div>
@endsection

@section('content')
@include('sweetalert::alert');
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                            <div class="col-sm-8">
                                <span id="card_title">
                                    <h2 class="mb-1"><i class="fas fa-car-side"></i>  {{ __('Transacción de pagos CSV') }}</h2>
                                </span>
                                <div class="text-muted fw-bold">
                                    <a href="{{ url('/index') }}">{{ __('Inicio') }}</a> <span class="mx-3">|</span> <a href="" class="breadcrumb-item active">{{ __('Transacción de pagos CSV') }}</a> <span class="mx-3">|</span> 2.6 GB <span class="mx-3">|</span> {{count($importPaymentTransactions)}} registros
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center justify-content-end">
                                <form action="{{ route('import-payment-transaction.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                     <div class="input-group">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04"><i class="fas fa-upload"></i> {{ __('Importar Archivo') }}</button>
                                          </div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="csv_file" accept=".csv" onchange="updateFilePath()" required>
                                          <label class="custom-file-label" for="inputGroupFile04">Elija el archivo</label>
                                        </div>

                                      </div>

                        </form>
                        </div>

                            </div>
                            </div>

                            </div>



                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="">
                            <table id="example1" namne="example1" class="table table-bordered table-striped table-responsive">
                                <thead class="thead">
                                    <tr>
                                        <th style="white-space: nowrap;">No</th>
                                        <th style="white-space: nowrap;">Identificador Transaccion</th>
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
                                        <th style="white-space: nowrap;">Recibes Saldo Viajes Iva Tarifas Contribuciones</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Ajuste</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Dinamica</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Espera Recoleccion</th>
                                        <th style="white-space: nowrap;">Recibes Saldo Viajes Pagos Transferencia Bancaria</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Cancelacion</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Promocion Desafio</th>
                                        <th style="white-space: nowrap;">Recibes Saldo Viajes Impuestos Iva Servicio</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Extra Gratificacion Usuario</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Promocion Turbo</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Otras Tarifas Ajuste</th>
                                        <th style="white-space: nowrap;">Recibes Ajustes Posteriores Viaje</th>
                                        <th style="white-space: nowrap;">Recibes Saldo Viajes Gastos Peaje</th>
                                        <th style="white-space: nowrap;">Recibes Saldo Viajes Reembolsos Deposito Validacion Cuenta</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Base</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Base Iva</th>
                                        <th style="white-space: nowrap;">Recibes Saldo Viajes Reembolsos Peaje</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Otras Ganancias Ajuste</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Promocion Ganancia Referir</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Impuestos Retencion</th>
                                        <th style="white-space: nowrap;">Recibes Tus Ganancias Tarifa Cancelacion Extra Espera Adicional</th>

                                        <th style="white-space: nowrap;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($importPaymentTransactions as $importPaymentTransaction)
                                        <tr>
                                            <td style="white-space: nowrap;">{{ ++$i }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->identificador_transaccion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->identificador_socio_app }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->nombre_socio_app }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->apellido_socio_app }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->identificador_viaje }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->descripcion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->nombre_organizacion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->alias_organizacion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->vs_informes }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_pagos_efectivo }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_impuestos }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_retencion_isr }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_tarifa }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_impuesto_servicio }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_retencion_iva }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_iva_tarifas_contribuciones }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_ajuste }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_dinamica }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_espera_recoleccion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_pagos_transferencia_bancaria }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_promocion_desafio }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_impuestos_iva_servicio }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_extra_gratificacion_usuario }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_promocion_turbo }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_otras_tarifas_ajuste }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_ajustes_posteriores_viaje }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_gastos_peaje }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_reembolsos_deposito_validacion_cuenta }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_base }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_base_iva }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_saldo_viajes_reembolsos_peaje }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_otras_ganancias_ajuste }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_promocion_ganancia_referir }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_impuestos_retencion }}</td>
											<td style="white-space: nowrap;">{{ $importPaymentTransaction->recibes_tus_ganancias_tarifa_cancelacion_extra_espera_adicional }}</td>
                                            <td style="white-space: nowrap;">
                                                <form action="{{ route('import-payment-transaction.destroy',$importPaymentTransaction->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('import-payment-transaction.show',$importPaymentTransaction->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('import-payment-transaction.edit',$importPaymentTransaction->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $importPaymentTransactions->links() !!} --}}
            </div>
        </div>
    </div>
@endsection

@section('footer')
<div class="float-right d-none d-sm-block">
    <b>Version</b> 1.5.0
  </div>
  <strong>Copyright &copy; 2023-2024 <a href="https://scud.com.mx">ScudLTE.com.mx</a>.</strong> Reservados todos los derechos.

@endsection
@section('css')

@endsection

@section('js')
    <script>



        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": false,

                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                language: {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %ds fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir",
                        "renameState": "Cambiar nombre",
                        "updateState": "Actualizar",
                        "createState": "Crear Estado",
                        "removeAllStates": "Remover Estados",
                        "removeState": "Remover",
                        "savedStates": "Estados Guardados",
                        "stateRestore": "Estado %d"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de",
                                "notContains": "No Contiene",
                                "notStartsWith": "No empieza con",
                                "notEndsWith": "No termina con"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d",
                        "showMessage": "Mostrar Todo",
                        "collapseMessage": "Colapsar Todo"
                    },
                    "select": {
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "%d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        },
                        "rows": {
                            "1": "1 fila seleccionada",
                            "_": "%d filas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "AM",
                            "PM"
                        ],
                        "months": {
                            "0": "Enero",
                            "1": "Febrero",
                            "10": "Noviembre",
                            "11": "Diciembre",
                            "2": "Marzo",
                            "3": "Abril",
                            "4": "Mayo",
                            "5": "Junio",
                            "6": "Julio",
                            "7": "Agosto",
                            "8": "Septiembre",
                            "9": "Octubre"
                        },
                        "weekdays": [
                            "Dom",
                            "Lun",
                            "Mar",
                            "Mie",
                            "Jue",
                            "Vie",
                            "Sab"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "stateRestore": {
                        "creationModal": {
                            "button": "Crear",
                            "name": "Nombre:",
                            "order": "Clasificación",
                            "paging": "Paginación",
                            "search": "Busqueda",
                            "select": "Seleccionar",
                            "columns": {
                                "search": "Búsqueda de Columna",
                                "visible": "Visibilidad de Columna"
                            },
                            "title": "Crear Nuevo Estado",
                            "toggleLabel": "Incluir:"
                        },
                        "emptyError": "El nombre no puede estar vacio",
                        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                        "removeError": "Error al eliminar el registro",
                        "removeJoiner": "y",
                        "removeSubmit": "Eliminar",
                        "renameButton": "Cambiar Nombre",
                        "renameLabel": "Nuevo nombre para %s",
                        "duplicateError": "Ya existe un Estado con este nombre.",
                        "emptyStates": "No hay Estados guardados",
                        "removeTitle": "Remover Estado",
                        "renameTitle": "Cambiar Nombre Estado"
                    }
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function updateFilePath() {
  var inputFile = document.querySelector('.custom-file-input');
  var fileName = inputFile.files[0].name;
  var filePathLabel = document.querySelector('.custom-file-label');
  filePathLabel.textContent = fileName;
}

    </script>


@stop
