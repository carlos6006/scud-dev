@extends('adminlte::master')
@section('title', 'Inicio')

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">


  </head>
  <body>

<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2"
        style="background-image: url('https://images.unsplash.com/photo-1554672408-730436b60dde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=726&q=80');">
    </div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">

                    <div class="{{ $auth_type ?? 'login' }}-logo">

                        {{-- Logo Image --}}
                        @if (config('adminlte.auth_logo.enabled', false))
                            <img src="{{ asset(config('adminlte.auth_logo.img.path')) }}"
                                alt="{{ config('adminlte.auth_logo.img.alt') }}"
                                @if (config('adminlte.auth_logo.img.class', null)) class="{{ config('adminlte.auth_logo.img.class') }}" @endif
                                @if (config('adminlte.auth_logo.img.width', null)) width="{{ config('adminlte.auth_logo.img.width') }}" @endif
                                @if (config('adminlte.auth_logo.img.height', null)) height="{{ config('adminlte.auth_logo.img.height') }}" @endif>
                        @else
                            <img src="{{ asset(config('adminlte.logo_img')) }}"
                                alt="{{ config('adminlte.logo_img_alt') }}" height="50">
                        @endif

                        {{-- Logo Label --}}
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}

                    </div>


                    <div class="card login-card-body {{ config('', 'card-outline card-primary') }}">
                        <label>Iniciar sesión</label>
                        <p class="my-0">La contabilidad de plataformas en buenas manos.</p>
                    </div>

                    <div class="card login-card-body ">
                        <form action="{{ $login_url }}" method="post">
                            @csrf

                            {{-- Email field --}}
                            <label for="username">Usuario</label>
                            <div class="input-group first mb-3">

                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}"
                                    autofocus>

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span
                                            class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="password">Contraseña</label>
                            {{-- Password field --}}
                            <div class="input-group mb-3">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('adminlte::adminlte.password') }}">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span
                                            class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                                    </div>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="icheck-primary"
                                        title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label for="remember">
                                            {{ __('adminlte::adminlte.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button type=submit
                                        class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                                        <span class="fas fa-sign-in-alt"></span>
                                        {{ __('adminlte::adminlte.sign_in') }}
                                    </button>
                                </div>
                            </div>

                            {{-- Password reset link --}}
                            @if ($password_reset_url)
                                <p class="my-0">
                                    <a href="{{ $password_reset_url }}">
                                        {{ __('adminlte::adminlte.i_forgot_my_password') }}
                                    </a>
                                </p>
                            @endif


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="js/main.js"></script>

  </body>
