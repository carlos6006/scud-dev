<div class="modal fade  text-left" id="ModalEdit_{{$permission->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h5 class="fw-bold">Actualizar permiso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--end::Modal header-->
            <div class="modal-body">
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                  <i class="fas fa-exclamation-triangle text-white mr-2" style="font-size: 2rem;"></i>
                  <div>
                    <h4 class="alert-heading">¡Advertencia!</h4>
                    <p>Al editar el nombre del permiso, es posible que rompa la funcionalidad de los permisos del sistema. Asegúrese de estar absolutamente seguro antes de continuar.</p>
                  </div>
                </div>
              </div>
            <!--begin::Modal body-->
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.permissions.update',$permission->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del permiso: *</label>
                        <input type="text" class="form-control" id="name_editar" name="name" value="{{ $permission->name }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>

        </div>
        <!--end::Modal body-->
    </div>
</div>
