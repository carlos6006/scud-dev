@extends('adminlte::page')

@section('title', 'Tipo')

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
                        @includeIf('partials.errors')

                        <form method="POST" action="{{ route('admin.types.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.type.form')

                        </form>
                    </div>
                </div>
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

@stop





