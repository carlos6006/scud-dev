<!-- Modal -->
<div class="modal fade " id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nombre del rol: *</label>
                      <input type="text" class="form-control" id="recipient-name" placeholder="Escribe el nombre del rol">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Permisos del rol:</label>
                      <table class="table">
                        <tbody>
                            <tr>
                                <td style="white-space: nowrap;">Acceso de administrador</td>
                                <td colspan="3"><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" class="select-all" name="select_all" id="select_all">
                                    <label class="form-check-label">
                                        Seleccionar todo
                                    </label>
                                </td>
                              </tr>
                          <tr>
                            <td scope="row">Gestión de usuarios</td>
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                            <td style="white-space: nowrap;"> <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_read">
                                    <span class="form-check-label">Leer</span>
                                </label>
                            </div>
                            </td>
                            <td style="white-space: nowrap;">
                                <div class="checkbox rows">
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" name="user_management_write" class="chk-box">
                                    <span class="form-check-label">Escribir</span>
                                </label>
                                </div>
                            </td>
                            <td style="white-space: nowrap;">
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
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                  <button type="button" class="btn btn-primary">Enviar</button>
                </div>

            </div>
            <!--end::Modal body-->
    </div>
  </div>
