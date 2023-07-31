<div class="modal fade bd-example-modal-lg" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header card-primary card-outline">
                <h3 class="mb-1 text-primary" id="modalCreateLabel"><i class="fas fa-pencil-alt"></i>{{ __(' Crear') }} permiso</h3>
            </div>
            <div class="modal-body">
                @includeIf('partials.errors')

                <form class="needs-validation" novalidate method="POST" action="{{ route('admin.permissions.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    @include('admin.permissions.form')

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
