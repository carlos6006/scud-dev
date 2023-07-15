@extends('layouts.app')

@section('template_title')
    {{ $changelog->name ?? "{{ __('Show') Changelog" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Changelog</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('changelogs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $changelog->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Version:</strong>
                            {{ $changelog->version }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $changelog->type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $changelog->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $changelog->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Categori Id:</strong>
                            {{ $changelog->categori_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ruta:</strong>
                            {{ $changelog->ruta }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Actualizacion:</strong>
                            {{ $changelog->fecha_actualizacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
