@extends('layouts.app')

@section('template_title')
    {{ $taxRegime->name ?? "{{ __('Show') Tax Regime" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tax Regime</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tax-regimes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $taxRegime->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $taxRegime->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
