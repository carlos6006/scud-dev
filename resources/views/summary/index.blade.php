@extends('adminlte::page')

@section('title', 'Resumenes')

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
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-7">
                                    <h2 class="mb-1 text-primary"><i class="fas fa-chart-line"></i> @yield('title')</h2>

                                </div>

                                <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                    <div class="btn-group mx-3" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-download"></i> Exportar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-file-csv"></i> Exportar CVS
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-file-pdf"></i> Exportar PDF
                                            </a>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <div class="tab-content">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="historialViajes-tab" data-toggle="tab" href="#historialViajes" role="tab" aria-controls="historialViajes" aria-selected="true">
                                        <i class="fas fa-road"></i> Historial de viajes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="gastos-tab" data-toggle="tab" href="#gastos" role="tab" aria-controls="gastos" aria-selected="false">
                                        <i class="fas fa-money-bill"></i> Gastos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                        <i class="far fa-envelope"></i> Contacto
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="historialViajes" role="tabpanel" aria-labelledby="historialViajes-tab">@include('summary.uber')</div>
                                <div class="tab-pane fade" id="gastos" role="tabpanel" aria-labelledby="gastos-tab">Contenido de la pestaña de Gastos</div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contenido de la pestaña de Contacto</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.5.0
    </div>
    <strong>Copyright &copy; 2023-2024 <a href="https://scud.com.mx">ScudLTE.com.mx</a>.</strong> Reservados todos los
    derechos.

@stop
@section('css')

@stop

@section('js')
    <script>

        function updateFilePath() {
            var inputFile = document.querySelector('.custom-file-input');
            var fileName = inputFile.files[0].name;
            var filePathLabel = document.querySelector('.custom-file-label');
            filePathLabel.textContent = fileName;
        }


        function toggleIconPosition(button) {
            var icon = button.querySelector("i");

            if (icon.classList.contains("fa-caret-right")) {
                icon.classList.remove("fa-caret-right");
                icon.classList.add("fa-caret-down");
            } else {
                icon.classList.remove("fa-caret-down");
                icon.classList.add("fa-caret-right");
            }
        }
    </script>


@stop
