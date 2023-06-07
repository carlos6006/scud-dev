<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


use App\Http\Controllers\DocentesController;
//use App\Http\Controllers\GmailController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');

Route::middleware(['auth','role:Admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
 });


//Route::get('/roles',[App\Http\Controllers\Admin\RolesController::class,'index'])->name('roles');

// Route::get('/', function () {
//     return view('auth/login');
// });
// Route::get('/users', function () {
//     return view('auth/register');
// });

Route::get('/users_index', function () {
    return view('auth/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::get('/docentes', [App\Http\Controllers\DocentesController::class, 'index']); */
Route::resource('/docentes',DocentesController::class);
//Route::resource('/correo',GmailController::class);


// Route::post('/correo/create', [App\Http\Controllers\GmailController::class, 'create'])->name('create');
//Route::get('/hola', function () {
//    return view('correo.create');
//});


