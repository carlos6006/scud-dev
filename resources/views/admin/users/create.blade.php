<div class="modal fade bd-example-modal-lg " id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header card-primary card-outline">
                 <h3 class="mb-1 text-primary" id="modalCreateLabel"><i class="fas fa-edit"></i>{{ __('Crear') }} usuario</h3>
            </div>

            <div class="modal-body">
                @includeIf('partials.errors')

                <form method="POST" action="{{ route('admin.users.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    @include('admin.users.form')

                </form>
            </div>
        </div>
    </div>
</div>
