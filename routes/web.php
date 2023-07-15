<?php

use Illuminate\Support\Facades\Route;
//use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Admin\IndexController;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChangelogController;


use App\Http\Controllers\ImportPaymentTransactionController;
use App\Http\Controllers\ImportBillXmlController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\EmailController;

use App\Http\Controllers\TypeController;

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
Auth::routes();

//Rutas de Administrador
Route::middleware(['auth', 'role:Admin'])->group(function () {
    //Index Administrador
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::name('admin.')->prefix('admin')->name('admin.')->prefix('admin')->group(function(){
        Route::resource('/changelogs', ChangelogController::class);
        Route::resource('/types', TypeController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/permissions', PermissionController::class);
        Route::resource('/roles', RoleController::class);

        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    });
});

//Rutas de Cliente **Administrador
Route::middleware(['auth', 'role:Admin|Cliente'])->group(function () {
    Route::resource('/import-bill-xmls', ImportBillXmlController::class);
    Route::post('/import-bill-xmls', [ImportBillXmlController::class, 'import'])->name('import-bills-xmls.import');
    Route::post('/import-bill-xmls', [ImportBillXmlController::class, 'import'])->name('import-bills-xmls.import');
    Route::resource('/summary', SummaryController::class);
    Route::get('/summary{columna}/{anio}/{mes}', [SummaryController::class,'uber'])->name('summary.uber');
    Route::resource('/import-payment-transaction', ImportPaymentTransactionController::class);
    Route::post('/import-payment-transaction', [ImportPaymentTransactionController::class, 'import'])->name('import-payment-transaction.import');
});






 Route::resource('/emails',EmailController::class)->middleware('auth');




