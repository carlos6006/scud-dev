<!-- Modal -->
<div class="modal fade text-left" id="ModalEdit_{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h5 class="fw-bold">Añadir un nuevo rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.roles.update',$role->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre del rol: *</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                    </div>

                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Permisos del rol:</label>


                            @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                            <div class="container">
                                <div class="badge-container">
                            <form class="ontainer-fluid" method="POST"
                            action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                                  <span class="badge badge-pill badge-primary d-inline-flex align-items-center">{{ $role_permission->name }} <button type="submit" class="close" aria-label="Cerrar">
                                    <span aria-hidden="true" class="align-self-center mx-1 text-danger">&times;</span>
                                  </button></span>
                                </form>
                            </div>
                          </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                  </form>

                  <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Role Permissions</h2>
                    <button type="button" class="btn btn-primary">Primary <span class="badge">7</span></button>
                    <span class="badge badge-primary">Notificación 1<button type="button" class="close">&times;</button></span>
                    <div>
                        <b-alert show dismissible>
                          Dismissible Alert! Click the close button over there <b>&rArr;</b>
                        </b-alert>
                      </div>


                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                    </div>
                    </form>
                </div>
            </div>
            <!--end::Modal body-->
    </div>
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
