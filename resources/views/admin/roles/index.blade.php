@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="container-fluid">
    </div>
@endsection

@section('content')
@include('admin.roles.create')
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
                                        <h2 class="mb-1"><i class="fas fa-user-tag"></i> @yield('title')</h2>
                                    </span>
                                    <div class="text-muted fw-bold">
                                        <a href="{{ url('/') }}">{{ __('Inicio') }}</a> <span class="mx-3">|</span>
                                        <a href="{{ route('admin.users.create') }}" class="breadcrumb-item active">@yield('title')</a> <span
                                            class="mx-3">|</span> {{ $tableSize }} Kb <span class="mx-3">|</span>
                                        {{ count($roles) }} registros
                                    </div>
                                </div>

                                <div class="col-sm-4 d-flex align-items-center justify-content-end">
                                    <a  href="" data-toggle="modal" data-target="#modalCreate"class="btn btn-primary float-right"
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
