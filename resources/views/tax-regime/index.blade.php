@extends('adminlte::page')

@section('title', 'Catálogo del Régimen Fiscal')

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
{{-- @include('admin.users.create') --}}
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
                                    {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $taxRegimes->total() !!} registros
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Clave</th>
										<th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taxRegimes as $taxRegime)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $taxRegime->clave }}</td>
											<td>{{ $taxRegime->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('admin.tax-regimes.destroy',$taxRegime->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.tax-regimes.show',$taxRegime->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.tax-regimes.edit',$taxRegime->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $taxRegimes->links() !!}
            </div>
        </div>
    </div>
@endsection
