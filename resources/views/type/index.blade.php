@extends('adminlte::page')

@section('title', 'Tipos')

@section('content_header')
    <div class="container-fluid">
    </div>
@endsection

@section('content')

    @include('sweetalert::alert')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-8">
                                    <span id="card_title">
                                        <h2 class="mb-1"><i class="fas fa-list"></i> @yield('title')</h2>
                                    </span>
                                    <div class="text-muted fw-bold">
                                        <a href="{{ url('/index') }}">{{ __('Inicio') }}</a> <span class="mx-3">|</span>
                                        <a href="" class="breadcrumb-item active">@yield('title')</a> <span
                                            class="mx-3">|</span> {{ $tableSize }} Kb <span class="mx-3">|</span>
                                        {{ count($types) }} registros
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
                                                <form action="{{ route('types.destroy',$type->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('types.show',$type->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('types.edit',$type->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $types->links() !!}
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
