@extends('adminlte::page')

@section('title', 'Agrgara Email')

@section('content_header')
    <h1>Agregar docente</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Email</span>
                    </div>
                    <div class="card-body">
                        <form id="myForm" method="post" action="{{ route('emails.store') }}" class="needs-validation" novalidate>

                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="first_name"  name="first_name"  onkeyup="mayusculas(this);generarEmail();generarEmail_alternate();generarCode();generarCodeAlternate()" onkeypress="return check(event)" value="{{ old('nombre') }}" required>
                                <div class="invalid-feedback">Por favor ingresa tu nombre.</div>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" onkeyup="mayusculas(this);generarEmail();generarEmail_alternate();generarCode();generarCodeAlternate()" onkeypress="return check(event)" value="{{ old('apellidos') }}" required>
                                <div class="invalid-feedback">Por favor ingresa tus apellidos.</div>
                            </div>
                            <div class="form-group">
                                <label for="rfc">RFC:</label>
                                <input type="text" class="form-control" id="rfc" name="rfc" onkeyup="mayusculas(this);generarPassword();generarCode();generarCodeAlternate()" value="{{ old('rfc') }}" required
                                    pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}">
                                <div class="invalid-feedback">Por favor ingresa un RFC válido (debe tener el formato
                                    AAAA######AAA).</div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electrónico</label>
                                <input type="email" class="form-control" id="email_address" name="email_address" placeholder="username@uvp.edu.mx" value="{{ old('email') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electrónico alternativo</label>
                                <input type="email" class="form-control" id="email_address_alternate" name="email_address_alternate" placeholder="username@uvp.edu.mx" value="{{ old('email') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput" class="form-label">Contraseña</label>
                                <input type="text" name="password" id="password" class="form-control" placeholder="temporaluvp + RFC(mayuscula)" value="{{ old('password') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput" class="form-label">Codigo</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="" value="{{ old('password') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput" class="form-label">Codigo</label>
                                <input type="text" name="code_alternate" id="code_alternate" class="form-control" placeholder="" value="{{ old('password') }}" readonly>
                            </div>
                            <div class="box-footer mt20 text-right">
                                <a href="{{ url('docentes') }}" class="btn btn-secondary">Regresar</a>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>

                        </form>

                        <form method="POST" action="{{ route('emails.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                           {{-- @include('email.form') --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')

@stop

@section('js')
    <script>
        // Validación del formulario con JS
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var form = document.getElementById('myForm');
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            }, false);
        })();



        function mayusculas(e) {
    e.value = e.value.toUpperCase();
}

function generarEmail() {
    document.getElementById("email_address").value =
        document.getElementById("first_name").value.split(' ')[0].toLowerCase() + '.' +
        document.getElementById("last_name").value.split(' ')[0] /* substr(0,2) */ .toLowerCase() + '@uvp.edu.mx'
    /* +
                ( Number(document.getElementById("numero3").value) || '') */
    ;
}

function generarEmail_alternate() {
    document.getElementById("email_address_alternate").value =
        document.getElementById("first_name").value.split(' ')[0].toLowerCase() + '.' +
        document.getElementById("last_name").value.split(' ')[0].toLowerCase() + '.' +
        document.getElementById("last_name").value.split(' ')[1].substring(0, 2) /* substr(0,2) */ .toLowerCase() + '@uvp.edu.mx'
    /* +
                ( Number(document.getElementById("numero3").value) || '') */
    ;
}
function generarPassword() {
    document.getElementById("password").value =
        'temporaluvp' + document.getElementById("rfc").value.toUpperCase()
    /* +
                ( Number(document.getElementById("numero3").value) || '') */
    ;
}
function generarCode() {
    document.getElementById("code").value ='gam create user '+
    document.getElementById("first_name").value.split(' ')[0].toLowerCase() + '.' +
        document.getElementById("last_name").value.split(' ')[0] /* substr(0,2) */ .toLowerCase() + ' firstname "'+ document.getElementById("first_name").value+'" lastname "'+document.getElementById("last_name").value+'" password "temporaluvp'+document.getElementById("rfc").value.toUpperCase()+'"'
    ;
}

function generarCodeAlternate() {
    document.getElementById("code_alternate").value ='gam create user '+
    document.getElementById("first_name").value.split(' ')[0].toLowerCase() + '.' +document.getElementById("last_name").value.split(' ')[0] /* substr(0,2) */ .toLowerCase() +'.'+
    document.getElementById("last_name").value.split(' ')[1].substring(0, 2) /* substr(0,2) */ .toLowerCase() + ' firstname "'+ document.getElementById("first_name").value+'" lastname "'+document.getElementById("last_name").value+'" password "temporaluvp'+document.getElementById("rfc").value.toUpperCase()+'"'
    ;
}


function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


    </script>

@stop

