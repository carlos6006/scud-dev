
@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Listado Roles</h1>
@stop

@section('content')
            <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                @include('components.flash_alerts')
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Inicio - Gestión de usuarios - Roles
                      </h3>

                    <div class="card-tools">
                      <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                          <a class="btn btn-primary" href="{{ route('admin.roles.create') }}"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square"></i> Agregar nuevo rol</a>
                        </li>
                      </ul>
                    </div>
                  </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="card-columns">
                        @foreach ($roles as $role)
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-shield"></i> {{ $role->name }}</h3>
                                <div class="card-tools"><form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-tool" data-card-widget="Eliminar" title="Eliminar">
                                <i class="fas fa-trash text-danger"></i>
                                </button>
</form>
                                </div>
                                </div>

                            <div class="card-body">
                            <h5 class="card-title">Total de usuarios con este rol:</h5>
                            <p class="card-text">
                            <ul>
                                <li><i class="fas fa-horizontal-rule-"></i>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipiscing elit</li>
                                <li>Integer molestie lorem at massa</li>
                                <li>Facilisis in pretium nisl aliquet</li>
                                <li>Nulla volutpat aliquam velit

                                <li>Eget porttitor lorem</li>
                                </ul>
                            </p>
                            <div class="card-body text-center">
                                <a href="#" class="btn btn-primary">Ver rol</a>
                                <a href="#" class="btn btn-primary">Editar rol</a>
                              </div>
                          </div>
                        </div>
                        @endforeach

                      </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

      <!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <td>Acceso de administrador</td>
                                <td colspan="3"><label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                    <input class="form-check-input" type="checkbox" value="" class="select-all" name="select_all" id="select_all">
                                    <label class="form-check-label">
                                        Seleccionar todo
                                    </label>
                                </td>
                              </tr>
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


@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-buttons-bs4/2.3.6/buttons.bootstrap4.min.css">
@stop
@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

<script type="text/javascript">
  $('#select_all').change(function(e) {
  if (e.currentTarget.checked) {
  $('.rows').find('input[type="checkbox"]').prop('checked', true);
} else {
    $('.rows').find('input[type="checkbox"]').prop('checked', false);
  }
});
    </script>
@stop
