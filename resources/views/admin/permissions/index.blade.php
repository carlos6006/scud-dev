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
@include('admin.permissions.create')
@include('sweetalert::alert')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

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
                                    <a data-toggle="modal" data-target="#modalCreate" class="btn btn-primary mx-3" data-placement="left">
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-2">Nombre del rol</th>
                                    <th class="col-5">Asignado a</th>
                                    <th class="col-2">Fecha de creación</th>
                                    <th class="text-right col-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($permissions as $permission)
                                        <td style="white-space: nowrap;">{{ $permission->name }}</td>
                                        <td style="white-space: nowrap;"><a href="#" class="badge badge-primary">Administrador</a></td>
                                        <td style="white-space: nowrap;">{{ $permission->created_at }}</td>
                                        {{-- <td style="white-space: nowrap;">
                                            <form class="boton-eliminar" action="{{ route('admin.permissions.destroy', $permission->id) }}" >
                                                <a class="btn btn-sm btn-primary " href=""><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="" aria-pressed="true"
                                                data-toggle="modal" data-target="#ModalEdit_{{ $permission->id }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td> --}}

                                        <td class="project-actions text-right">

                                                <a class="btn btn-sm btn-primary " href=""><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                <a class="btn btn-sm btn-success" href="" aria-pressed="true"
                                                    data-toggle="modal" data-target="#ModalEdit_{{ $permission->id }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                @include('admin.permissions.edit')
                                                <form class="d-inline boton-eliminar"
                                                action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>

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

@endsection

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.5.0
    </div>
    <strong>Copyright &copy; 2023-2024 <a href="https://scud.com.mx">ScudLTE.com.mx</a>.</strong> Reservados todos los
    derechos.

@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session('destroy') == 'true')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Su registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif


    @if (session('update') == 'true')
    <script>
        Swal.fire(
            '¡Actualizado!',
            'Su registro ha sido modificado.',
            'success'
        )
    </script>
@endif


    <script>
        $('.boton-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@stop
