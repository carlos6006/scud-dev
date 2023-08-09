<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"><i class="fas fa-user-check"></i> General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Fiscales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Adicionales</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <!-- Imagen -->
                                <div class="row">
                                    <!-- Etiqueta img con la clase img-thumbnail -->
                                    <img src="https://themewagon.github.io/stisla-1/assets/img/avatar/avatar-1.png"
                                        alt="Avatar" class="rounded-circle elevation-2" width="150">
                                    <div class="col-sm-0 align-self-start first-column">
                                        <div id="attachment"><i class="fa fa-camera fa-lg" style="color: red;"></i>
                                        </div>
                                        <input id="file-input" type="file" style="display:none" multiple />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Nombre de usuario -->
                                        <div class="form-group">
                                            {{ Form::label('name_user', 'Nombre de usuario') }}
                                            {{ Form::text('name_user', $users->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de usuario']) }}
                                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('Rol', 'Rol de la cuenta') }}
                                            <select id="inputRol" class="form-control custom-select" name="role">
                                                <option disabled selected>Seleccione un rol</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $users->roles->contains($role->id) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Nombre de usuario -->
                                        <div class="form-group">
                                            {{ Form::label('name', 'Nombre') }}
                                            {{ Form::text('name', $users->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
                                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Apellidos -->
                                        <div class="form-group">
                                            {{ Form::label('name', 'Apellido(s)') }}
                                            {{ Form::text('name', $users->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
                                            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Correo electrónico -->
                                        <div class="form-group">
                                            {{ Form::label('email', 'Direccion email') }}
                                            {{ Form::text('email', $users->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchActivo">
                                                <label class="custom-control-label" for="customSwitchActivo">Cuenta suspendida</label>
                                            </div>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchTwo_Steps">
                                                <label class="custom-control-label" for="customSwitchTwo_Steps">Generar contraseña y notificarle al usuario</label>
                                            </div>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchForcePasswordChange">
                                                <label class="custom-control-label" for="customSwitchForcePasswordChange">Forzar cambio de contraseña</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...
                    </div>
                </div>

            </div>
            <div class="box-footer mt20 d-flex justify-content-end">
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancelar</a>
                <span style="margin-left: 10px;"></span>
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
            </div>
        </div>

    </div>
