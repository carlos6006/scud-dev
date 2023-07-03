@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Import Bill Xml
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Import Bill Xml</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('import-bill-xmls.update', $importBillXml->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('import-bill-xml.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
