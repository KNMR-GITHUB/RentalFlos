<?php

use Illuminate\Support\Facades\Route;

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


// group routes below

Route::get('/dashboard', function(){
    return view('menus.dashboard.dashboard');
})->middleware('auth')->name("layout");
