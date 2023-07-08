<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ImportPaymentTransactionController;
use App\Http\Controllers\ImportBillXmlController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ChangelogController;
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
Route::get('/', function () {
    return view('auth/login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');*/



Route::middleware(['auth','role:Admin'])->name('admin.')->prefix('admin')->group(function(){
   // Route::get('/', [IndexController::class, 'index'])->name('index');
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

 Route::middleware(['auth','role:Admin'])->name('import-payment-transaction.')->prefix('import-payment-transaction')->group(function(){
    Route::resource('/', ImportPaymentTransactionController::class);
    Route::post('/', [ImportPaymentTransactionController::class, 'import'])->name('import');
});

 Route::resource('/import-bill-xmls',ImportBillXmlController::class)->middleware('auth');
 Route::post('/import-bill-xmls', [ImportBillXmlController::class, 'import'])->name('import-bills-xmls.import')->middleware('auth');

 Route::resource('/emails',EmailController::class)->middleware('auth');

 Route::resource('/changelogs',ChangelogController::class)->middleware('auth');
 Route::resource('/types',TypeController::class)->middleware('auth');




 //Auth::routes();

 Route::middleware(['auth','role:Admin'])->name('import-payment-transaction.')->prefix('import-payment-transaction')->group(function(){
    Route::resource('/', ImportPaymentTransactionController::class);
    Route::post('/', [ImportPaymentTransactionController::class, 'import'])->name('import');
});

 //Route::resource('/import-payment-transaction',ImportPaymentTransactionController::class);
// Route::post('/import-payment-transaction', [ImportPaymentTransactionController::class, 'import'])->name('import-payment-transaction.import')->middleware('auth');
 //Route::post('import-payment-transaction/import', ImportPaymentTransactionController::class)->name('import-payment-transaction.import');



 //Route::post('/import-payment-transaction', [App\Http\Controllers\ImportPaymentTransactionController::class, 'import'])->name('import');



//Route::get('/roles',[App\Http\Controllers\Admin\RolesController::class,'index'])->name('roles');

// Route::get('/', function () {
//     return view('auth/login');
// });
// Route::get('/users', function () {
//     return view('auth/register');
// });

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

/* Route::get('/docentes', [App\Http\Controllers\DocentesController::class, 'index']); */
Route::resource('/docentes',DocentesController::class);
//Route::resource('/correo',GmailController::class);


// Route::post('/correo/create', [App\Http\Controllers\GmailController::class, 'create'])->name('create');
//Route::get('/hola', function () {
//    return view('correo.create');
//});


