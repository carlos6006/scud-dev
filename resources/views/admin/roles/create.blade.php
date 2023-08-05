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
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default card-primary card-outline">
                    <div class="card-header card-primary card-outline">
                        <h3 class="mb-1 text-primary"><i class="fas fa-pencil-alt"></i>{{ __(' Crear') }} {{ strtolower(trim($__env->yieldContent('title'))) }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.roles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.roles.form')

                        </form>

                    </div>

                </div>
                {!! $permissions->links() !!}

            </div>
        </div>
    </section>
@stop
@section('footer')

@include('footer')

@stop

@section('css')

@stop

@section('js')

<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                // Agregar el evento input al input del campo "name"
                var nameInput = form.querySelector("[name='name']");
                nameInput.addEventListener('input', function () {
                    if (nameInput.value.trim() === '') {
                        document.getElementById('nameFeedback').style.display = 'block';
                    } else {
                        document.getElementById('nameFeedback').style.display = 'none';
                    }
                });

                // Agregar el evento keydown al input del campo "name"
                nameInput.addEventListener('keydown', function () {
                    if (nameInput.value.trim() === '') {
                        document.getElementById('nameFeedback').style.display = 'block';
                    } else {
                        document.getElementById('nameFeedback').style.display = 'none';
                    }
                });
                form.addEventListener('submit', function (event) {
                    var failed = false;
                    var nameValue = nameInput.value.trim();

                    // Verificar si el campo 'name' está vacío
                    if (nameValue === '') {
                        document.getElementById('nameFeedback').style.display = 'block'; // Agregar clase de Bootstrap para mostrar el campo como inválido
                        failed = true;
                    } else {
                        document.getElementById('nameFeedback').style.display = 'none'; // Agregar clase de Bootstrap para mostrar el campo como inválido
                    }

                    // Verificar si algún checkbox está seleccionado
                    if ($("[name='permissions_core_[]']:checked").length === 0) {
                        document.getElementById('permissionsFeedback').style.display = 'block';
                        failed = true;

                        // Agregar el atributo 'required' a todos los checkboxes
                        var checkboxes = form.querySelectorAll("[name='permissions_core_[]']");
                        checkboxes.forEach(function (checkbox) {
                            checkbox.setAttribute('required', 'required');
                        });
                    } else {
                        document.getElementById('permissionsFeedback').style.display = 'none';
                    }

                    if (form.checkValidity() === false) {
                        failed = true;
                    }

                    if (failed) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);

                // Agregar el evento onchange a todos los checkboxes
                var checkboxes = form.querySelectorAll("[name='permissions_core_[]']");
                checkboxes.forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        for (var i = 0; i < checkboxes.length; i++) {
                            checkboxes[i].removeAttribute('required');
                        }
                        if ($("[name='permissions_core_[]']:checked").length > 0) {
                            document.getElementById('permissionsFeedback').style.display = 'none';
                        } else {
                            document.getElementById('permissionsFeedback').style.display = 'block';
                        }
                    });
                });
            });
        }, false);
    })();
    </script>

@stop


