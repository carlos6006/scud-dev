@extends('adminlte::page')

@section('title', 'Registrar')

@section('content_header')
    <h1>Editar docente</h1>
@stop

@section('content')


<?php


//$fileList = shell_exec('gam info user nt43418 2>&1');
//echo "<pre>$fileList</pre>";

?>

    <div class="container">
        {{--  <h1>Mi formulario con estilos de Bootstrap</h1> --}}
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar correo docente</h3>
                </div>
                <div class="card-body">

@if($errors->any())

<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <ul>
    @foreach ( $errors->all() as $error )
    <li>{{$error}}</li>
    @endforeach
    </ul>


    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif

                    <form id="myForm" method="post" action="{{ url('docentes/'.$docente->id) }}" class="needs-validation" novalidate>
                        @method("PUT")
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre"  name="nombre"  onkeyup="mayusculas(this);generarEmail();" onkeypress="return check(event)" value="{{ $docente->first_name}}" required>
                            <div class="invalid-feedback">Por favor ingresa tu nombre.</div>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" onkeyup="mayusculas(this);generarEmail();" onkeypress="return check(event)" value="{{ $docente->last_name}}" required>
                            <div class="invalid-feedback">Por favor ingresa tus apellidos.</div>
                        </div>
                        <div class="form-group">
                            <label for="rfc">RFC:</label>
                            <input type="text" class="form-control" id="rfc" name="rfc" onkeyup="mayusculas(this);generarPassword();" value="{{ $docente->rfc}}" required
                                pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}">
                            <div class="invalid-feedback">Por favor ingresa un RFC válido (debe tener el formato
                                AAAA######AAA).</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="username@uvp.edu.mx" value="{{ $docente->email_address}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput" class="form-label">Contraseña</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="temporaluvp + RFC(minuscula)" value="{{ $docente->password}}" readonly>
                        </div>

                        <div class="card-footer">
                            <a href="{{ url('docentes') }}" class="btn btn-secondary">Regresar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        {{--  <button type="submit" class="btn btn-primary">Enviar</button> --}}
                    </form>
                </div>
            </div>


        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
            <link rel="stylesheet" href="bs-stepper.min.css">
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
            document.getElementById("email").value =
                document.getElementById("nombre").value.split(' ')[0].toLowerCase() + '.' +
                document.getElementById("apellidos").value.split(' ')[0] /* substr(0,2) */ .toLowerCase() + '@uvp.edu.mx'
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
