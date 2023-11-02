<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\TaxRegimeController;

use App\Http\Controllers\Admin\Changelog\ChangelogController;
use App\Http\Controllers\Admin\Changelog\TypeController;
use App\Http\Controllers\Admin\Changelog\CategoryController;

use App\Http\Controllers\ImportPaymentTransactionController;
use App\Http\Controllers\ImportBillXmlController;
use App\Http\Controllers\SummaryController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de Administrador
Route::middleware(['auth', 'role:Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/changelogs', ChangelogController::class);
    Route::resource('/types', TypeController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tax-regimes', TaxRegimeController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/roles', RoleController::class);

    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
});



//Rutas de Cliente **Administrador
Route::middleware(['auth', 'role:Admin|Cliente'])->group(function () {
    Route::resource('/import-bill-xmls', ImportBillXmlController::class);
    Route::post('/import-bill-xmls', [ImportBillXmlController::class, 'import'])->name('import-bills-xmls.import');
    Route::resource('/summary', SummaryController::class);
    Route::get('/summary{columna}/{anio}/{mes}', [SummaryController::class,'uber'])->name('summary.viajes');
    Route::get('/summary{columna}/{anio}/{mes}', [SummaryController::class,'uber'])->name('summary.general');
    Route::resource('/import-payment-transaction', ImportPaymentTransactionController::class);
    Route::post('/import-payment-transaction', [ImportPaymentTransactionController::class, 'import'])->name('import-payment-transaction.import');
});
require __DIR__.'/auth.php';
