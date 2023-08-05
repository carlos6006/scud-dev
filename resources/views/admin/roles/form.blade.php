<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name', 'Nombre del rol *') }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del rol', 'required']) }}
            <div class="invalid-feedback" id="nameFeedback">Por favor, ingresa un nombre para el rol.</div>
        </div>
        <div class="form-group">
            {{ Form::label('permisos', 'Permisos de rol') }}

            <div class="row">
                @php
                    $counter = 0;
                @endphp

                @foreach ($permissions as $permission)
                    @if ($counter % 2 === 0)
                        </div>
                        <div class="row">
                    @endif

                    <div class="col-md-3"> {{-- Use col-md-3 for 4 columns --}}
                        <div class="custom-control custom-checkbox mx-2">
                            @php
                                // Comprobar si el permiso está asignado al rol actual
                                $isChecked = $role->permissions->contains('id', $permission->id);
                            @endphp
                            {{ Form::checkbox('permissions_core_[]', $permission->id, $isChecked, ['id' => "permissions_core_{$permission->id}", 'class' => 'custom-control-input']) }}
                            {{ Form::label("permissions_core_{$permission->id}", "#{$permission->id} {$permission->name}", ['class' => 'custom-control-label']) }}
                        </div>
                    </div>

                    @php
                        $counter++;
                    @endphp
                @endforeach
            </div>

            <div class="invalid-feedback" id="permissionsFeedback">
                Por favor, selecciona al menos un permiso.
            </div>
        </div>
    </div>
    <div class="box-footer mt20 d-flex justify-content-end">
        <a href="{{ url('admin/roles') }}" class="btn btn-secondary">Cancelar</a>
        <span style="margin-left: 10px;"></span><!-- Aquí agregamos un espacio de 10px -->
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
    </div>
</div>
