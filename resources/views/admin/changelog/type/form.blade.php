<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre', 'Nombre') }}
            {{ Form::text('nombre', $type->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-fw fa-save"></i> Guardar</button>
    </div>
</div>
