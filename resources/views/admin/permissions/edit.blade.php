<div class="modal fade bd-example-modal-lg " id="modalEdit_{{ $permission->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header card-primary card-outline">
                <h3 class="mb-1 text-primary" id="modalEditLabel"><i class="fas fa-pencil-alt"> </i>{{ __(' Editar') }}
                    permiso de aplicación</h3>
            </div>
            <div class="modal-body">
                @includeIf('partials.errors')
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle text-white mr-2" style="font-size: 2rem;"></i>
                    <div>
                        <h4 class="alert-heading">¡Advertencia!</h4>
                        <p>Al editar el nombre del permiso, es posible que rompa la funcionalidad de los permisos del
                            sistema. Asegúrese de estar absolutamente seguro antes de continuar.</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del permiso: *</label>
                        <input type="text" class="form-control" id="name_editar" name="name"
                            value="{{ $permission->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Descripción del permiso:</label>
                        <textarea class="form-control" value="{{ $permission->descripcion }}" id="description" name="description" rows="3"
                            placeholder="Ingrese una descripción del permiso"></textarea>
                    </div>



                    <!-- Aquí agregamos el modal-footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
                    </div>
                    <!-- Fin del modal-footer -->

                </form>

            </div>
        </div>
    </div>
</div>

@section('css')

@stop

@section('js')

@stop


