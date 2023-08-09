<div class="box box-info padding-1">
    <div class="box-body">
            {{ Form::hidden('user_id', auth()->check() ? auth()->user()->id : '', ['class' => 'form-control']) }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('Versión') }}
                        {{ Form::number('version', $latestVersion, ['class' => 'form-control' . ($errors->has('version') ? ' is-invalid' : ''), 'placeholder' => 'Version', 'required' => true, 'step' => '0.01']) }}
                        {!! $errors->first('version', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        {{ Form::label('fecha_actualizacion') }}
                        {{ Form::text('fecha_actualizacion', \Carbon\Carbon::now()->addMonth()->startOfMonth()->toDateString(), ['class' => 'form-control' . ($errors->has('fecha_actualizacion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Actualizacion']) }}
                        {!! $errors->first('fecha_actualizacion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
            </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('type_id', 'Tipo') }}
                    {{ Form::select('type_id', $types, $changelog->type_id, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opción']) }}
                    {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('categori_id', 'Categoria') }}
                    {{ Form::select('categori_id', $category, $changelog->categori_id, ['class' => 'form-control' . ($errors->has('categori_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una opción']) }}
                    {!! $errors->first('categori_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('titulo', $changelog->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::textarea('descripcion', $changelog->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion', 'style' => 'resize: none; max-height: 80px;']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('ruta') }}
            {{ Form::text('ruta', $changelog->ruta, ['class' => 'form-control' . ($errors->has('ruta') ? ' is-invalid' : ''), 'placeholder' => 'Ruta']) }}
            {!! $errors->first('ruta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 d-flex justify-content-end">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
        <span style="margin-left: 10px;"></span>
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
    </div>

</div>
