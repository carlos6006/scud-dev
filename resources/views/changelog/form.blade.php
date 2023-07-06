<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $changelog->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('version') }}
            {{ Form::text('version', $changelog->version, ['class' => 'form-control' . ($errors->has('version') ? ' is-invalid' : ''), 'placeholder' => 'Version']) }}
            {!! $errors->first('version', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_id') }}
            {{ Form::text('type_id', $changelog->type_id, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => 'Type Id']) }}
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $changelog->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $changelog->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categori_id') }}
            {{ Form::text('categori_id', $changelog->categori_id, ['class' => 'form-control' . ($errors->has('categori_id') ? ' is-invalid' : ''), 'placeholder' => 'Categori Id']) }}
            {!! $errors->first('categori_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ruta') }}
            {{ Form::text('ruta', $changelog->ruta, ['class' => 'form-control' . ($errors->has('ruta') ? ' is-invalid' : ''), 'placeholder' => 'Ruta']) }}
            {!! $errors->first('ruta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_actualizacion') }}
            {{ Form::text('fecha_actualizacion', $changelog->fecha_actualizacion, ['class' => 'form-control' . ($errors->has('fecha_actualizacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Actualizacion']) }}
            {!! $errors->first('fecha_actualizacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>