<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        $tableSize = User::getTableSize();
        $item_permissions = Permission::selectRaw("DISTINCT SUBSTRING_INDEX(name, '.', 1) AS resultado")
        ->get();
        return view('admin.users.index', compact('users', 'tableSize','item_permissions'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());

    }
    public function create()
    {
        $users = new User();
        $roles = Role::all();
       //dd($users);
        return view('admin.users.create', compact('users','roles'));

    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $users = User::create($request->all());
        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }


    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('users','roles'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.show', compact('user', 'roles', 'permissions'));
    }


    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
    }
}
