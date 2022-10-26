<?php

use Illuminate\Support\Facades\Route;
use App\Middleware\LoginSession;
use App\Http\Controllers\LoginController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return view('pages.form-login');
})->name('login');

Route::get('/singup', function(){
	return view('pages.form-singup');
})->name('singup');

Route::post('/singup',[LoginController::class, 'singup'])->name('create.user');

Route::get('/panel',function(){
	echo "Bienvenido al panel administrativo";
})->middleware(['valid.sesion']);

Route::get('/verificacion',function(){
	return view('pages.verification-email');
})->name('verificacion');

Route::get('/confirmation/{token}/{email}',[LoginController::class, 'twoFactorAuthentication'])->name('confirmation');

Route::post('/two_confirmation',[LoginController::class, 'checkStatusCode'])->name('confirm.code');

Route::post('/login',[LoginController::class, 'validateSession']);

Route::get('/sesiones',function(){
	echo "Esta es la pantalla de sesión";
})->middleware(['auth']);

Route::get('/confirmacion_login',[LoginController::class, 'confirmationCode'])->middleware(['auth','valid.sesion']);
