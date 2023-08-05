@extends('adminlte::page')

@section('title', 'Usuarios')

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
@include('admin.users.create')
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
                                    <h2 class="mb-1 text-primary"><i class="fas fa-users"></i> @yield('title')</h2>
                                    <div class="text-muted fw-bold">
                                        {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $users->total() !!} registros
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th>Rol</th>
                                        <th>Ultimo acceso</th>
                                        <th>Verificacion dos passo</th>
                                        <th>Estatus</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $userItem)

                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <div class="media">
                                                    <img width="50" src="https://picsum.photos/75/75"
                                                        class="rounded-circle elevation-2 align-self-center mr-3"
                                                        alt="Foto de perfil">
                                                    <div class="media-body my-2">
                                                        <h5 class="mt-0 mb-1">{{ $userItem->name }}</h5>
                                                        {{ $userItem->email }}
                                                    </div>
                                                </div>
                                            <td>
                                                @if ($userItem->roles)
                                                    @foreach ($userItem->roles as $user_role)
                                                    @php
                                                    // Define un array con los colores de badge que desees
                                                    $badgeColors = ['badge-primary', 'badge-secondary', 'badge-success', 'badge-danger'];
                                                    // Calcula un índice para seleccionar el color de badge
                                                    $colorIndex = $user_role->id % count($badgeColors);
                                                    // Obtiene el color de badge correspondiente
                                                    $badgeColor = $badgeColors[$colorIndex];
                                                @endphp
                                                    {{-- <a href="#" class="badge {{ $badgeColor }}">{{ $role->name }}</a> --}}
                                                    <span class="badge {{ $badgeColor }}">{{ $user_role->name }}</span>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>{{ $userItem->last_access }}</td>
                                            <td>{{ $userItem->two_steps }}</td>
                                            <td>
                                                @if ($userItem->activo == 1)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end mb-2">
                                                <form action="{{ route('admin.users.destroy', $userItem->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.users.show', $userItem->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.users.edit', $userItem->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-footer ">
                        {!! $users->links() !!}
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
    document.getElementById("attachment").addEventListener('click', function() {
    document.getElementById("file-input").click();});
    </script>
@stop
