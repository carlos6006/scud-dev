@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
    </div>
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-8">
                                    <span id="card_title">
                                        <h2 class="mb-1"><i class="fas fa-user"></i> @yield('title')</h2>
                                    </span>
                                    <div class="text-muted fw-bold">
                                        <a href="{{ url('/') }}">{{ __('Inicio') }}</a> <span class="mx-3">|</span>
                                        <a href="{{ route('admin.users.create') }}" class="breadcrumb-item active">@yield('title')</a> <span
                                            class="mx-3">|</span> {{ $tableSize }} Kb <span class="mx-3">|</span>
                                        {{ count($users) }} registros
                                    </div>
                                </div>

                                <div class="col-sm-4 d-flex align-items-center justify-content-end">
                                    <a  data-toggle="modal"
                                    data-target="#modalCreate" class="btn btn-primary float-right"
                                        data-placement="left">
                                        <i class="fas fa-plus-circle"></i> {{ __('Crear nuevo') }}
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
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td> <div class="media">
                                                <img width="50" src="https://picsum.photos/75/75" class="rounded-circle elevation-2 align-self-center mr-3" alt="Foto de perfil">
                                                <div class="media-body my-2">
                                                    <h5 class="mt-0 mb-1">{{ $user->name }}</h5>
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                            <td>
                                                @if ($user->roles)
                                                    @foreach ($user->roles as $user_role)
                                                        @php
                                                            $color = '';
                                                            switch ($user_role->name) {
                                                                case 'Admin':
                                                                    $color = 'badge bg-primary';
                                                                    break;
                                                                case 'Cliente':
                                                                    $color = 'badge bg-success';
                                                                    break;
                                                                case 'Supervisor':
                                                                    $color = 'badge bg-warning';
                                                                    break;
                                                                default:
                                                                    $color = 'badge bg-secondary';
                                                            }
                                                        @endphp
                                                        <span class="{{ $color }}">{{ $user_role->name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
											<td>{{ $user->last_access }}</td>
											<td>{{ $user->two_steps }}</td>
											<td>
                                                @if ($user->activo == 1)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactivo</span>
                                                @endif
                                            </td>



                                            <td>
                                                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $users->links() !!}
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
