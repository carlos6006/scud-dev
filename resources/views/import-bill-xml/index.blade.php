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
                                    <h2 class="mb-1"><i class="fas fa-file-invoice-dollar"></i>  {{ __('Facturas de gastos') }}</h2>
                                </span>
                                <div class="text-muted fw-bold">
                                    <a href="{{ url('/index') }}">{{ __('Inicio') }}</a> <span class="mx-3">|</span> <a href="" class="breadcrumb-item active">{{ __('Facturas de gastos') }}</a> <span class="mx-3">|</span> 2.6 GB <span class="mx-3">|</span> {{count($importBillXmls)}} registros
                                </div>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center justify-content-end">
                                <form action="{{ route('import-bills-xmls.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                     <div class="input-group">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04"><i class="fas fa-upload"></i> {{ __('Importar XML') }}</button>
                                          </div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="xml_file" accept=".xml" onchange="updateFilePath()" required>
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
                        <div class="table-responsive">
                            <table id="example1" namne="example1" class="table table-bordered table-striped table-responsive">
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

											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Certificado }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Exportacion }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Fecha }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Folio }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_FormaPago }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_MetodoPago }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_LugarExpedicion }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Moneda }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_NoCertificado }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Sello }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Serie }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_SubTotal }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_TipoDeComprobante }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Total }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Comprobante_Version }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Emisor_RFC }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Emisor_RegimenFiscal }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Emisor_Nombre }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Receptor_DomicilioFiscal }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Receptor_Nombre }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Receptor_RegimenFiscal }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Receptor_RFC }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Receptor_UsoCFDI }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_Cantidad }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_ClaveProdServ }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_ClaveUnidad }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_Descripcion }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_Importe }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_NoIdentificacion }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_ObjetoImp }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_Unidad }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Concepto_ValorUnitario }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Traslado_Base }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Traslado_Importe }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Traslado_Impuesto }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Traslado_TasaOCuota }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Traslado_TipoFactor }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_FechaTimbrado }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_NoCertificadoSAT }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_RfcProvCertif }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_SelloCFD }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_SelloSAT }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_UUID }}</td>
											<td style="white-space: nowrap;">{{ $importBillXml->Tfd_Version }}</td>

                                            <td style="white-space: nowrap;">
                                                <form action="{{ route('import-bill-xmls.destroy',$importBillXml->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('import-bill-xmls.show',$importBillXml->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('import-bill-xmls.edit',$importBillXml->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $importBillXmls->links() !!}
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

