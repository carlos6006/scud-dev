@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Import Payment Transaction
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Import Payment Transaction</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('import-payment-transaction.update', $importPaymentTransaction->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('import-payment-transaction.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
