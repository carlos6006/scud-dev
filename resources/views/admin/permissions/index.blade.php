@extends('adminlte::page')

@section('title', 'Permisos de aplicación')

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
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-7">
                                <h2 class="mb-1 text-primary"><i class="fas fa-check-circle"></i> @yield('title')</h2>
                                <div class="text-muted fw-bold">
                                    {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $permissions->total() !!} registros
                                </div>
                            </div>
                            <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    @csrf
                                    @method('POST')
                                    <a href="{{ route('admin.permissions.create') }}"  class="btn btn-primary mx-3"
                                    data-placement="left">
                                    <i class="fas fa-plus-circle"></i> {{ __('Crear nuevo') }}
                                </a>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i> Exportar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="#"><i class="fas fa-file-csv"></i> Exportar CVS</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-2">Nombre del rol</th>
                                    <th class="col-5">Descripción del rol</th>
                                    <th class="col-2">Asignado a</th>
                                    <th class="col-1">Fecha de creación</th>
                                    <th class="col-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($permissions as $permission)
                                        <td style="white-space: nowrap;">{{ $permission->name }}</td>
                                        <td style="white-space: nowrap;">{{ $permission->description }}</td>
                                        <td style="white-space: nowrap;">
                                            @foreach ($permission->roles as $role)
                                                @php
                                                    // Define un array con los colores de badge que desees
                                                    $badgeColors = ['badge-primary', 'badge-secondary', 'badge-success', 'badge-danger'];
                                                    // Calcula un índice para seleccionar el color de badge
                                                    $colorIndex = $role->id % count($badgeColors);
                                                    // Obtiene el color de badge correspondiente
                                                    $badgeColor = $badgeColors[$colorIndex];
                                                @endphp
                                                <a href="#" class="badge {{ $badgeColor }}">{{ $role->name }}</a>
                                            @endforeach
                                        </td>
                                        <td style="white-space: nowrap;">{{ $permission->created_at }}</td>
                                        <td class="project-actions">
                                            <div class="d-flex justify-content-end mb-2">
                                                <form class="d-inline boton-eliminar" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" id="deleteForm_{{ $permission->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-sm btn-success"
                                                    href="{{ route('admin.permissions.edit', $permission->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i>
                                                    {{ __('Editar') }}</a>

                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ htmlentities($permission->id) }}', '{{ htmlentities($permission->name) }}')">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                </form>

                                            </div>

                                        </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer ">
                        {!! $permissions->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop

@section('footer')
    <footer>
    </footer>
@stop


@section('css')

@stop

@section('js')
   <script>
 function confirmDelete(permissionId, permissionName) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Estás a punto de eliminar el permiso '${permissionName}'. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, enviar el formulario
            document.getElementById('deleteForm_' + permissionId).submit();
        }
    });
}

</script>
@stop
