<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="name" class="col-form-label">Nombre del rol: *</label>
            <input type="text" class="form-control" id="name" placeholder="Escribe el nombre del rol" autocomplete="off" name="name" required>
            <div class="invalid-feedback" id="nameFeedback">
                Por favor, ingresa un nombre para el rol.
            </div>
        </div>
        <hr>

        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Permisos de rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item_permissions as $permissions)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" required class="form-check-input" value="{{ $permissions->id }}" id="permissions_core_{{ $permissions->id }}" name="permissions_core_[]" >
                                    <label class="form-check-label" for="permissions_core_{{ $permissions->id }}">
                                        <span class="font-weight-bold">#{{ $permissions->id }}</span> {{ $permissions->name }}
                                    </label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="invalid-feedback" id="permissionsFeedback">
                    Por favor, selecciona al menos un permiso.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            // Agregar el evento input al input del campo "name"
            var nameInput = form.querySelector("[name='name']");
            nameInput.addEventListener('input', function () {
                if (nameInput.value.trim() === '') {
                    document.getElementById('nameFeedback').style.display = 'block';
                } else {
                    document.getElementById('nameFeedback').style.display = 'none';
                }
            });

            // Agregar el evento keydown al input del campo "name"
            nameInput.addEventListener('keydown', function () {
                if (nameInput.value.trim() === '') {
                    document.getElementById('nameFeedback').style.display = 'block';
                } else {
                    document.getElementById('nameFeedback').style.display = 'none';
                }
            });
            form.addEventListener('submit', function (event) {
                var failed = false;
                var nameValue = nameInput.value.trim();

                // Verificar si el campo 'name' está vacío
                if (nameValue === '') {
                    document.getElementById('nameFeedback').style.display = 'block'; // Agregar clase de Bootstrap para mostrar el campo como inválido
                    failed = true;
                } else {
                    document.getElementById('nameFeedback').style.display = 'none'; // Agregar clase de Bootstrap para mostrar el campo como inválido
                }

                // Verificar si algún checkbox está seleccionado
                if ($("[name='permissions_core_[]']:checked").length === 0) {
                    document.getElementById('permissionsFeedback').style.display = 'block';
                    failed = true;

                    // Agregar el atributo 'required' a todos los checkboxes
                    var checkboxes = form.querySelectorAll("[name='permissions_core_[]']");
                    checkboxes.forEach(function (checkbox) {
                        checkbox.setAttribute('required', 'required');
                    });
                } else {
                    document.getElementById('permissionsFeedback').style.display = 'none';
                }

                if (form.checkValidity() === false) {
                    failed = true;
                }

                if (failed) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);

            // Agregar el evento onchange a todos los checkboxes
            var checkboxes = form.querySelectorAll("[name='permissions_core_[]']");
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].removeAttribute('required');
                    }
                    if ($("[name='permissions_core_[]']:checked").length > 0) {
                        document.getElementById('permissionsFeedback').style.display = 'none';
                    } else {
                        document.getElementById('permissionsFeedback').style.display = 'block';
                    }
                });
            });
        });
    }, false);
})();



</script>
