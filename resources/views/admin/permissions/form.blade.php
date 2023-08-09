<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name', 'Nombre del permiso: *') }}
            {{ Form::text('name', $permission->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese un nombre de permiso', 'required' => true]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Descripción del permiso:') }}
            {{ Form::textarea('description',  $permission->description, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Ingrese una descripción del permiso']) }}
        </div>
    </div>
    <div class="box-footer mt20 d-flex justify-content-end">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
        <span style="margin-left: 10px;"></span>
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
    </div>
</div>
