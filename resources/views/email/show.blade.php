@extends('layouts.app')

@section('template_title')
{{ $email->name ?? __('Show Email') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Email</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('emails.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>First Name:</strong>
                            {{ $email->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $email->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $email->rfc }}
                        </div>
                        <div class="form-group">
                            <strong>Email Address:</strong>
                            {{ $email->email_address }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
