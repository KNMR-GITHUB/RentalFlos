<?php

use App\Http\Controllers\AuthenticateController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
})->name("home");

Route::get('/login', function(){
    return view('login.login');
})->name('login');

Route::get('/register', function(){
    return view('login.register');
})->name('register');

Route::get('/forgot', function(){
    return view('login.forgot');
})->name("forgot");

// create user or registration

Route::post('/registration', [UserController::class, 'create_user'])->name("create_user");

// user login
Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('authenticate');
// user logout
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

// group routes below
// routes for menu items
Route::get('/dashboard', function(){
    return view('menus.dashboard.dashboard');
})->middleware('auth')->name("dashboard");

Route::get('/properties', function(){
    return view('menus.properties.properties');
})->middleware('auth')->name("properties");
