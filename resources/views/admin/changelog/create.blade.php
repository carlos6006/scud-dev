<div class="modal fade bd-example-modal-lg " id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h2 class="modal-title text-white" id="modalCreateLabel">{{ __('Crear') }} registro de cambio</h2>
            </div>

            <div class="modal-body">
                @includeIf('partials.errors')

                <form method="POST" action="{{ route('admin.changelogs.store') }}" role="form" enctype="multipart/form-data">
                    @csrf

                    @include('admin.changelog.form')

                </form>
            </div>
        </div>
    </div>
</div>
