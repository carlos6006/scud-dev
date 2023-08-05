<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"><i class="fas fa-user-check"></i> Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Fiscales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Contact</a>
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
                                    <div id="attachment"><i class="fa fa-camera fa-lg" style="color: red;"></i></div>
                                    <input id="file-input" type="file" style="display:none" multiple />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <!-- Nombre -->
                            <div class="form-group">
                                {{ Form::label('name', 'Nombre completo') }}
                                {{ Form::text('name', $users->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <!-- Correo electrónico -->
                            <div class="form-group">
                                {{ Form::label('email', 'Correo electrónico') }}
                                {{ Form::text('email', $users->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    {{ Form::label('Rol', 'Rol de la cuenta') }}
                                    <select id="inputRol" class="form-control custom-select">
                                        <option disabled="" selected="">Seleccione un rol</option>
                                        <option>On Hold</option>
                                        <option>Canceled</option>
                                        <option>Success</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchActivo">
                                        <label class="custom-control-label" for="customSwitchActivo">¿Cuenta activa?</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchTwo_Steps">
                                        <label class="custom-control-label" for="customSwitchTwo_Steps">¿Verificación dos
                                            pasos?</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>

        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
