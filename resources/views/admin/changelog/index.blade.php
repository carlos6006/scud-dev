@extends('adminlte::page')

@section('title', 'Cambios de sistema')

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
    @include('admin.changelog.create')
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
                                    <h2 class="mb-1 text-primary"><i class="fas fa-road"></i> @yield('title')</h2>
                                    <div class="text-muted fw-bold">
                                        {{ $tableSize }} Kb <span class="mx-3">|</span>{!! $changelogs->total() !!}
                                        registros
                                    </div>
                                </div>
                                <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    @csrf
                                    @method('POST')
                                    <a data-toggle="modal" data-target="#modalCreate" class="btn btn-primary mx-3"
                                        data-placement="left">
                                        <i class="fas fa-plus-circle"></i> {{ __('Crear nuevo') }}
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            @foreach ($changelogs->sortByDesc('fecha_actualizacion')->groupBy('fecha_actualizacion') as $fecha => $registros)
                                <div class="card">
                                    <div class="card-header d-flex align-items-center" id="heading{{ $loop->iteration }}">
                                        <h5 class="mb-0 flex-grow-1">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                                aria-controls="collapse{{ $loop->iteration }}">
                                                {{ __('SCUD v') }}{{ $registros->first()->version }}{{ __(' - ') }}{{ \Carbon\Carbon::parse($fecha)->isoFormat('D [de] MMMM [del] YYYY') }}
                                            </button>
                                        </h5>

                                    </div>
                                    <div id="collapse{{ $loop->iteration }}" class="collapse"
                                        aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordion">
                                        <div class="card-body">
                                            @foreach ($registros->groupBy('tipo_id') as $tipo => $registrosTipo)
                                                <h6 class="fs-6 fw-bold mb-1 text-bols">
                                                    {{ $registrosTipo->first()->type->nombre }}</h6>
                                                <ul class="my-0 py-0">
                                                    @foreach ($registrosTipo as $registro)
                                                        <li class="py-2">
                                                            <div class="d-flex align-items-center"
                                                                id="heading{{ $loop->iteration }}">
                                                                <div class="mb-0 flex-grow-1">
                                                                    {{ $registro->descripcion }}
                                                                </div>
                                                                <div class="card-tools">
                                                                    <form
                                                                        action="{{ route('admin.changelogs.destroy', $registro->id) }}"
                                                                        class="boton-eliminar" method="POST"
                                                                        action="">
                                                                        <a class="btn btn-sm btn-success"
                                                                            href="{{ route('admin.changelogs.edit', $registro->id) }}"><i
                                                                                class="fa fa-fw fa-edit"></i>
                                                                            {{ __('Editar') }}</a>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm"><i
                                                                                class="fa fa-fw fa-trash"></i>
                                                                            {{ __('Eliminar') }}</button>
                                                                    </form>
                                                                </div>
                                                            </div>


                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer ">
                        {{-- {!! $changelogs->links() !!} --}}
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
