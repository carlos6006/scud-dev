@extends('adminlte::page')

@section('title', 'Actualizar categoria')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Category</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.changelog.category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
