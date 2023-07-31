<div class="modal fade bd-example-modal-lg " id="modalEdit_{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header card-primary card-outline">
                 <h3 class="mb-1 text-primary" id="modalEditLabel"><i class="fas fa-pencil-alt"> </i>{{ __(' Editar') }} rol</h3>
            </div>
                <div class="modal-body">
                    @includeIf('partials.errors')

                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <p class="font-weight-bold ">Nombre del rol: *</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" required id="name" name="name"
                                            value="{{ $role->name }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-save"></i> Guardar cambios <!-- Puedes cambiar el texto aquí -->
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <p class="font-weight-bold ">Asiganar permisos:</p>
                                        <div class="input-group">
                                            <select class="custom-select" id="permission" name="permission">
                                                <option selected>Selecciona permiso...</option>
                                                @foreach ($permissions as $permission)
                                                @unless ($role->permissions->contains('name', $permission->name))
                                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                @endunless
                                            @endforeach
                                            </select>
                                            @error('name')
                                            <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-arrow-down"></i> Asiganar rol</button>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-deck">
                        <div class="card">
                          <div class="card-body">
                            <p class="font-weight-bold">Permisos asigandos: </p>
                            <div class="container">
                                @if ($role->permissions)
                                    @foreach ($role->permissions as $role_permission)
                                        <span
                                            class="badge badge-pill badge-primary d-inline-flex align-items-center my-1">{{ $role_permission->name }}
                                            <form class="ontainer-fluid" method="POST"
                                                action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="close" aria-label="Cerrar">
                                                    <span aria-hidden="true"
                                                        class="align-self-center mx-1 text-danger">&times;</span>
                                                </button>
                                            </form>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                </div>
        </div>
    </div>
</div>

@section('css')

@stop

@section('js')

@stop
