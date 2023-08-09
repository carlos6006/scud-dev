@extends('layouts.app')

@section('template_title')
    {{ $type->name ?? "{{ __('Show') Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $type->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
