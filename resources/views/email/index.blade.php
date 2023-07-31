@extends('adminlte::page')

@section('template_title')
{{ $importBillXml->name ?? __('Show') . ' ' . __('Emails') }}
@endsection

@section('content_header')
    <div class="container-fluid">
    </div>
@endsection

@section('content')
@include('sweetalert::alert')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                            <div class="row mb-2">
                                <div class="col-sm-8">
                                    <span id="card_title">
                                        <h2 class="mb-1"><i class="fas fa-file-invoice-dollar"></i>  {{ __('Creación de correos electronicos') }}</h2>
                                    </span>
                                    <div class="text-muted fw-bold">
                                        <a href="{{ url('/index') }}">{{ __('Inicio') }}</a> <span class="mx-3">|</span> <a href="" class="breadcrumb-item active">{{ __('Facturas de gastos') }}</a> <span class="mx-3">|</span> 2.6 GB <span class="mx-3">|</span> {{count($emails)}} registros
                                    </div>
                                </div>
                                <div class="col-sm-4 d-flex align-items-center justify-content-end">
                                    <div class="float-right">
                                        <a href="{{ route('emails.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Crear nuevo') }}
                                        </a>
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
                            <table id="example1" namne="example1" class="table table-bordered ">

                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre(s)</th>
										<th>Apellidos</th>
										<th>RFC</th>
										<th>Correo electronico</th>
                                        <th>Estatus</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emails as $email)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $email->first_name }}</td>
											<td>{{ $email->last_name }}</td>
											<td>{{ $email->rfc }}</td>
											<td>{{ $email->email_address }}</td>
                                            <td>
                                                @if ($email->status === 'active')
                                                <a class="badge badge-success" href="{{ route('emails.suspend', $email->id) }}">
                                                    <span class="rounded-circle bg-lime" style="width: 8px; height: 8px; display: inline-block; margin-right: 5px;"></span>
                                                    Activo
                                                  </a>
                                                @else
                                                <a class="badge bg-teal" href="{{ route('emails.active', $email->id) }}">
                                                    <span class="rounded-circle bg-white" style="width: 8px; height: 8px; display: inline-block; margin-right: 5px;"></span>
                                                    Suspendido
                                                  </a>

                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-end mb-2">
                                                <form action="{{ route('emails.destroy',$email->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emails.show',$email->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emails.edit',$email->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('emails.change_password', $email->id) }}"> <i class="fa fa-fw fa-undo"></i> {{ __('Restablecer contraseña') }} </a>

                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
