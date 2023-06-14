@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <div class="content row align-items-center my-1">
        <div class="col">
            <h1 class="h3 mb-0 page-title">{{ __('Lista de roles') }}</h1>
        </div>
        <div class="col-auto">
            <a class="btn btn-primary" href="" data-toggle="modal" data-target="#Modal_create"><i
                    class="fas fa-plus-square"></i> Agregar rol</a>
        </div>
    </div>

    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">{{ __('Inicio') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Roles') }}</li>
            </ol>
        </div>

    </div>
@stop

@section('content')
    @include('admin.roles.add')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('components.flash_alerts')
                </div>
            </div>
        </div>
    </section>

    <div class="card-deck">
        @foreach ($roles as $role)
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-shield"></i> {{ $role->name }}</h3>
                <div class="card-tools">
                    <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
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
                    <li><i class="fas fa-horizontal-rule-"></i>Lorem ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>Nulla volutpat aliquam velit

                    <li>Eget porttitor lorem</li>
                </ul>
                </p>
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i> Ver rol</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit_{{ $role->id }}"><i class="fas fa-edit"></i> Editar rol</a>
                    @include('admin.roles.edit')
                    @include('admin.permissions.add')

                </div>
            </div>
          </div>
        </div>

        @endforeach
      </div>

@stop

@section('footer')
<div class="float-right d-none d-sm-block">
    <b>Version</b> 1.5.0
  </div>
  <strong>Copyright &copy; 2023-2024 <a href="https://scud.com.mx">ScudLTE.com.mx</a>.</strong> Reservados todos los derechos.

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

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
@stop
