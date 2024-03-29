@extends('adminlte::page')

@section('title', 'Roles de usuario')

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-7">
                                    <h2 class="mb-1 text-primary"><i class="fas fa-user-tag"></i> @yield('title')</h2>
                                    <div class="text-muted fw-bold">
                                        {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $roles->total() !!}
                                        registros
                                    </div>
                                </div>
                                <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    @csrf
                                    @method('POST')
                                    <a href="{{ route('admin.roles.create') }}"  class="btn btn-primary mx-3"
                                        data-placement="left">
                                        <i class="fas fa-plus-circle"></i> {{ __('Crear nuevo') }}
                                    </a>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i> Exportar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="#"><i class="fas fa-file-csv"></i> Exportar
                                                CVS</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i> Exportar
                                                PDF</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-deck">
                        @foreach ($roles as $role)
                            <div class="col-sm-4 my-2">
                                <div class="card ">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-user-tag"></i> {{ $role->name }}</h3>
                                        <div class="card-tools">
                                            <form class="boton-eliminar" id="deleteForm_{{ $role->id }}" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="card-widget" title="Eliminar" onclick="confirmDelete('{{ $role->id }}')">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Lista de permisos:</h5>
                                            <small>{{ $role->users->count() }} usuarios con este rol</small>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="badge-list">
                                                    @if ($role->permissions)
                                                        @php
                                                            $totalItems = $role->permissions->count();
                                                            $itemsPerColumn = ceil($totalItems / 2);
                                                        @endphp
                                                        @foreach ($role->permissions->take($itemsPerColumn) as $role_permission)
                                                            <li><span class="badge badge-pill badge-primary">{{ $role_permission->name }}</span></li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="badge-list">
                                                    @if ($role->permissions)
                                                        @php
                                                            $totalItems = $role->permissions->count();
                                                            $itemsPerColumn = ceil($totalItems / 2);
                                                        @endphp
                                                        @foreach ($role->permissions->slice($itemsPerColumn) as $role_permission)
                                                            <li><span class="badge badge-pill badge-primary">{{ $role_permission->name }}</span></li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col text-center mb-2">
                                            <a class="btn btn-primary center-block" href="{{ route('admin.roles.edit',$role->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }} rol</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
    <style>
        /* Your custom CSS styles go here */
        .badge-list {
            list-style: none;
            padding-left: 0;
        }

        .badge-list li {
            margin-bottom: 5px;
        }
    </style>
@stop

@section('js')
<script>
    function confirmDelete(roleId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Estás a punto de eliminar el rol '{{ $role->name }}'. Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                document.getElementById('deleteForm_' + roleId).submit();
            }
        });
    }
</script>

@stop
