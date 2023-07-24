<div class="box box-info padding-1">
    <div class="box-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- Imagen -->
                    <div class=" row">
                        <!-- Etiqueta img con la clase img-thumbnail -->
                        <img src="https://st4.depositphotos.com/4329009/19956/v/450/depositphotos_199564354-stock-illustration-creative-vector-illustration-of-default.jpg"
                            alt="Avatar" class="rounded-circle elevation-2 align-self-center" width="150">
                        <div class="col-sm-0  align-self-start first-column">
                            <div id="attachment"><i class="fa fa-camera fa-lg" style="color: red;"></i></div>
                            <input id="file-input" type="file" style="display:none" multiple />
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Nombre -->
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre completo') }}
                        {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <!-- Correo electrónico -->
                    <div class="form-group">
                        {{ Form::label('email', 'Correo electrónico') }}
                        {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
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
                            <label class="custom-control-label" for="customSwitchTwo_Steps">¿Verificación dos pasos?</label>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fv-row">
            <!--begin::Label-->
            <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
            <!--end::Label-->

            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-semibold">
                        <!--begin::Table row for Administrator Access-->
                        <tr>
                            <td class="text-gray-800">
                                Administrator Access
                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Allows full access to the system" data-bs-original-title="Allows full access to the system" data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                </span>
                            </td>
                            <td colspan="3">
                                <!--begin::Checkbox for Administrator Access-->
                                <div class="form-check form-switch form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="administrator_access" name="administrator_access">
                                    <label class="form-check-label" for="administrator_access">Seleccionar permisos de administrador</label>
                                </div>
                                <!--end::Checkbox for Administrator Access-->
                            </td>
                        </tr>
                        <!--end::Table row for Administrator Access-->

                        <!--begin::Table row for User Management-->
                        @foreach ($item_permissions as $permissions)
                        <tr>

                            <td class="text-gray-800">{{ $permissions->resultado }} </td>

                            <td>
                                <!--begin::Checkbox for User Management Read-->
                                <div class="form-check form-switch form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="user_management_read" name="user_management_read">
                                    <label class="form-check-label" for="user_management_read">Leer</label>
                                </div>
                                <!--end::Checkbox for User Management Read-->
                            </td>
                            <td>
                                <!--begin::Checkbox for User Management Write-->
                                <div class="form-check form-switch form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="user_management_write" name="user_management_write">
                                    <label class="form-check-label" for="user_management_write">Escribir</label>
                                </div>
                                <!--end::Checkbox for User Management Write-->
                            </td>
                            <td>
                                <!--begin::Checkbox for User Management Create-->
                                <div class="form-check form-switch form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" id="user_management_create" name="user_management_create">
                                    <label class="form-check-label" for="user_management_create">Crear</label>
                                </div>
                                <!--end::Checkbox for User Management Create-->
                            </td>
                        </tr>
                        @endforeach
                        <!--end::Table row for User Management-->
                        <!-- ... Otras filas de la tabla aquí ... -->
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>


        <div class="checkbox">
            <label>
                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
            </label>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
