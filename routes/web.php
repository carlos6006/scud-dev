<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


use App\Http\Controllers\DocentesController;
use App\Http\Controllers\GmailController;

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


Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();
    return view('correo.create');
   /*  dd($user);
 */
   /*  $user->email; */
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::get('/docentes', [App\Http\Controllers\DocentesController::class, 'index']); */
Route::resource('/docentes',DocentesController::class);
//Route::resource('/correo',GmailController::class);

Route::post('/correo/create', [App\Http\Controllers\GmailController::class, 'create'])->name('create');
Route::get('/hola', function () {
    return view('correo.create');
});


