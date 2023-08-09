@extends('adminlte::page')

@section('title', 'Tipos')

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
                                    <h2 class="mb-1 text-primary"><i class="fas fa-list"></i> @yield('title')</h2>
                                    <div class="text-muted fw-bold">
                                        {{ $tableSize }} Kb <span class="mx-3">|</span>  {{ count($types) }} registros
                                    </div>
                                </div>
                                <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                        @csrf
                                        @method('POST')
                                        <a href="{{ route('types.create') }}"  class="btn btn-primary mx-3"
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

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $type->nombre }}</td>

                                            <td>
                                                <div class="d-flex justify-content-end mb-2">
                                                <form action="{{ route('types.destroy',$type->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('types.show',$type->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('types.edit',$type->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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
                {!! $types->links() !!}
            </div>
        </div>
    @stop

@section('footer')
    @include('footer')
@stop


@section('css')

@stop

@section('js')

@stop

