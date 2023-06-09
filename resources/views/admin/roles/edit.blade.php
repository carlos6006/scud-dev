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
                      <table class="table">
                        <tbody
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                            <tr>
                                <td>{{ $role_permission->name }}</td>
                                <td colspan="3"><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" class="select-all" name="select_all" id="select_all">
                                    <label class="form-check-label">
                                        Seleccionar todo
                                    </label>
                                </td>
                              </tr>
                              @endforeach
                              @endif
                          <tr>
                            <td scope="row">Gestión de usuarios</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Gestión de contenido</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Gestión financiera</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Reportes</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Suscripciones</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Tikets</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Controles de API</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>


                          <tr>
                            <td scope="row">Gestión de base de datos</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>

                          <tr>
                            <td scope="row">Respaldos</td>
                            <td> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_create">
                                    <span class="form-check-label">Crear
                                </span>
                                </label>
                                </div>
                           </td>
                          </tr>
                        </tbody>
                      </table>


                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                  </form>


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
