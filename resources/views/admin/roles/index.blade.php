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
@include('admin.roles.create')
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
                                <h2 class="mb-1 text-primary"><i class="fas fa-tasks"></i> @yield('title')</h2>
                                <div class="text-muted fw-bold">
                                    {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $roles->total() !!} registros
                                </div>
                            </div>
                            <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    @csrf
                                    @method('POST')
                                    <a data-toggle="modal" data-target="#modalCreate" class="btn btn-primary mx-3" data-placement="left">
                                        <i class="fas fa-plus-circle"></i> {{ __('Crear nuevo') }}
                                    </a>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    <div class="card-deck my-3">
        @foreach ($roles as $role)
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-tag"></i> {{ $role->name }}</h3>
                <div class="card-tools">
                    <form class="boton-eliminar" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-tool btn-sm" data-card-widget="Eliminar" title="Eliminar">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Lista de permisos:</h5>
                    <small>3 usuarios con este rol</small>
                </div>
                <p class="card-text">
                <ul>
                    @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                    <li><i class="fas fa-horizontal-rule-"></i>{{ $role_permission->name }}</li>
                    @endforeach
                @endif
                </ul>
                </p>
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i> Ver rol</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit_{{ $role->id }}"><i class="fas fa-edit"></i> Editar rol</a>
                    @include('admin.roles.edit')
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

@endsection

@section('footer')
<div class="float-right d-none d-sm-block">
    <b>Version</b> 1.5.0
  </div>
  <strong>Copyright &copy; 2023-2024 <a href="https://scud.com.mx">ScudLTE.com.mx</a>.</strong> Reservados todos los derechos.

  @endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @endsection

@section('js')
<script type="text/javascript">
  $('#select_all').change(function(e) {
  if (e.currentTarget.checked) {
  $('.rows').find('input[type="checkbox"]').prop('checked', true);
} else {
    $('.rows').find('input[type="checkbox"]').prop('checked', false);
  }
});
    </script>

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
@endsection
