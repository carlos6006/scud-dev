<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;


class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $tableSize = Permission::getTableSize();
        $roles = Role::whereNotIn('name', [''])->paginate(10);
        $roleItem = new Role();

        // Agregar el número de usuarios asociados a cada rol
        foreach ($roles as $role) {
            $role->userCount = $role->users->count();
        }

        $item_permissions = Permission::all();
        return view('admin.roles.index', compact('roles', 'permissions', 'tableSize', 'item_permissions','roleItem','role'));
    }

    public function create()
{
    $role = new Role();
    $permissions = Permission::paginate(20); // Consulta todos los permisos desde la base de datos
    return view('admin.roles.create', compact('role', 'permissions')) ->with('i', (request()->input('page', 1) - 1) * $permissions->perPage());
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Role::$rules);
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $name = $request->input('name');

    // Consultar si el rol ya existe en la base de datos
    $existingRole = Role::where('name', $name)->first();

    if ($existingRole) {
        // Si el rol ya existe, muestra un mensaje de error
        Alert::error('¡Error!', 'El nombre del rol ya existe.')->flash();
        return redirect()->route('admin.roles.index');
    }

    // Si el rol no existe, crea el nuevo rol
    $role = Role::create(['name' => $name]);

    // Obtener los permisos seleccionados del formulario
    $selectedPermissions =  $request->input('permissions_core_', []);

    // Asignar los permisos seleccionados al nuevo rol
    $role->permissions()->attach($selectedPermissions);

    // Mostrar un mensaje de éxito
    Alert::success('¡Éxito!', 'El rol ha sido creado exitosamente.')->flash();

    // Redirecciona a la página anterior
    return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        // Validar los datos enviados en el formulario
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions_core_' => 'array', // Asegurarse de que los permisos sean enviados como un array
        ]);

        // Actualizar el nombre del rol
        $role->update(['name' => $request->input('name')]);

        // Obtener los permisos seleccionados del formulario
        $selectedPermissions = $request->input('permissions_core_', []);

        // Sincronizar los permisos seleccionados con el rol
        $role->permissions()->sync($selectedPermissions);

        // Mostrar un mensaje de éxito
        Alert::success('¡Éxito!', 'El rol ha sido actualizado exitosamente.')->flash();

        // Redireccionar a la página anterior
        return redirect()->route('admin.roles.index');
    }


    // public function update(Request $request, Role $role)
    // {
    //     $validated = $request->validate(['name' => ['required', 'min:3']]);
    //     $role->update($validated);

    //     return to_route('admin.roles.index')->with('update','true');
    // }

    public function destroy(Role $role)
    {

        // Eliminar los permisos asignados al rol antes de eliminar el rol
        $role->permissions()->detach();

        // Eliminar el rol
        $role->delete();

        return back()->with('destroy', 'true');
    }


    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission not exists.');
    }

}
