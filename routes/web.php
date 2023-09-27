<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-classes', [RegisterController::class, 'registerClasses'])->name('register.classes');

// Auth routes

Route::get('/login', function(){return redirect('/amoclient/redirect');})->name('login');
Route::get('/amoclient/ready', function(){return redirect('/home');});

Route::get('/logout', function(){return redirect('/amoclient/logout');})->name('logout');

Route::get('/register', function() {return abort(404);});
Route::post('/register', function() {return abort(404);});
