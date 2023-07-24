<!-- Modal  Create-->
<div class="modal fade " id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <!--begin::Modal header-->
        <div class="modal-header">
            <!--begin::Modal title-->
            <h5 class="fw-bold">Agregar nuevo permiso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--end::Modal header-->

        <!--begin::Modal body-->
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.permissions.store') }}">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre del permiso: *</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Ingrese un nombre de permiso">
                </div>
                <div class="form-group">
                    <div class="fv-row mb-7">
                        <!--begin::Checkbox-->
                        <label class="form-check form-check-custom form-check-solid me-9">
                            <input class="form-check-input" type="checkbox" value="" name="permissions_core"
                                id="permissions_core">
                            <p><strong>Establecer como permiso básico.</strong></p>
                        </label>

                        <!--end::Checkbox-->
                    </div>
                    <div class="text-gray-600">
                        <p>El permiso establecido como <strong>Permiso básico</strong> se bloqueará <strong>no se
                                podrá editar</strong> en el
                            futuro.</p>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
            </form>
        </div>

    </div>
    <!--end::Modal body-->
</div>
</div>
