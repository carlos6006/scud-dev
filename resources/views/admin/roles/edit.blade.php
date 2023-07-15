<!-- Modal -->
<div class="modal fade text-left bd-example-modal-lg" id="ModalEdit_{{ $role->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h5 class="modal-title" id="exampleModalLongTitle">Editar rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body">
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
                                        <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $role->name }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Actualizar</button>
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

    <!--end::Modal body-->
</div>



<script type="text/javascript">
    $('#select_all').change(function(e) {
        if (e.currentTarget.checked) {
            $('.rows').find('input[type="checkbox"]').prop('checked', true);
        } else {
            $('.rows').find('input[type="checkbox"]').prop('checked', false);
        }
    });
</script>
