@extends('layouts.app')

@section('template_title')
    Changelog
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Changelog') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('changelogs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                                        
										<th>User Id</th>
										<th>Version</th>
										<th>Type Id</th>
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Categori Id</th>
										<th>Ruta</th>
										<th>Fecha Actualizacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($changelogs as $changelog)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $changelog->user_id }}</td>
											<td>{{ $changelog->version }}</td>
											<td>{{ $changelog->type_id }}</td>
											<td>{{ $changelog->titulo }}</td>
											<td>{{ $changelog->descripcion }}</td>
											<td>{{ $changelog->categori_id }}</td>
											<td>{{ $changelog->ruta }}</td>
											<td>{{ $changelog->fecha_actualizacion }}</td>

                                            <td>
                                                <form action="{{ route('changelogs.destroy',$changelog->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('changelogs.show',$changelog->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('changelogs.edit',$changelog->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $changelogs->links() !!}
            </div>
        </div>
    </div>
@endsection
