@extends('adminlte::page')

@section('title', 'Categorias')

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
    @include('sweetalert::alert')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="float-left">
                                <h2 class="mb-1 text-primary"><i class="fas fa-tag"></i> @yield('title')</h2>
                                <div class="text-muted fw-bold">
                                    {{ $tableSize }} Kb <span class="mx-3">|</span>  {{ count($categories) }} registros
                                </div>
                            </div>
                            <div class="float-right">
                                @csrf
                                @method('POST')
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mx-3" data-placement="left">
                                    <i class="fas fa-plus-circle"></i> {{ __('Crear nuevo') }}
                                </a>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-download"></i> Exportar
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-csv"></i> Exportar CVS</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $category->nombre }}</td>

                                            <td class="d-flex justify-content-end mb-2">
                                                <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.categories.show',$category->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.categories.edit',$category->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"  onclick="confirmDelete('{{ htmlentities($category->id) }}', '{{ htmlentities($category->nombre) }}')"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categories->links() !!}
            </div>
        </div>
    @stop

@section('footer')
    <footer>
    </footer>
@stop


@section('css')

@stop

@section('js')
<script>
 function confirmDelete(categoryId, categoryNombre) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Estás a punto de eliminar el permiso '${categoryNombre}'. Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, enviar el formulario
            document.getElementById('deleteForm_' + categoryId).submit();
        }
    });
}

</script>
@stop



