@extends('layouts.app')

@section('template_title')
    Email
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Email') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('emails.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>First Name</th>
										<th>Last Name</th>
										<th>Rfc</th>
										<th>Email Address</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emails as $email)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $email->first_name }}</td>
											<td>{{ $email->last_name }}</td>
											<td>{{ $email->rfc }}</td>
											<td>{{ $email->email_address }}</td>

                                            <td>
                                                <form action="{{ route('emails.destroy',$email->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emails.show',$email->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emails.edit',$email->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $emails->links() !!}
            </div>
        </div>
    </div>
@endsection
