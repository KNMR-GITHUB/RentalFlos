<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\propertiesController;
use App\Http\Controllers\tenantsController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// basic routes

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

// registration,login,logout routes

Route::post('/registration', [UserController::class, 'create_user'])->name("create_user");

Route::put('/updateUsers/{user}', [UserController::class, 'update'])->middleware('auth')->name("updateUsers");

Route::put('/changeUserPassword/{user}', [UserController::class, 'changePassword'])->middleware('auth')->name("changeUserPassword");

// user login
Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('authenticate');
// user logout
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

//
// routes for menu items
//

// dashboard routes

Route::get('/dashboard', function(){
    return view('menus.dashboard.dashboard');
})->middleware('auth')->name("dashboard");


// properties routes

Route::get('/properties', [propertiesController::class,'display'])->middleware('auth')->name("properties");

Route::get('/createProperties', [propertiesController::class,'create'])->middleware('auth')->name("createProperties");

Route::post('/storeProperties', [propertiesController::class,'store'])->middleware('auth')->name("storeProperties");

Route::get('/viewProperties/{property}', [propertiesController::class,'show'])->middleware('auth')->name("showProperties");

Route::get('/editProperties/{property}', [propertiesController::class,'edit'])->middleware('auth')->name("editProperties");

Route::put('/updateProperties/{property}', [propertiesController::class,'update'])->middleware('auth')->name("updateProperties");


// tenants routes

Route::get('/tenants', [tenantsController::class,'display'])->middleware('auth')->name("tenants");

Route::get('/createTenants', [tenantsController::class,'create'])->middleware('auth')->name("createTenants");

Route::post('/storeTenants', [tenantsController::class,'store'])->middleware('auth')->name("storeTenants");

Route::get('/viewTenants/{tenant}', [tenantsController::class,'show'])->middleware('auth')->name("showTenants");

Route::get('/editTenants/{tenant}', [tenantsController::class,'edit'])->middleware('auth')->name("editTenants");

Route::put('/updateTenants/{tenant}', [tenantsController::class,'update'])->middleware('auth')->name("updateTenants");

// rent routes

Route::get('/rent', function(){
    return view('menus.rent.rent');
})->middleware('auth')->name("rent");

// expenses routes

Route::get('/expenses', function(){
    return view('menus.expenses.expenses');
})->middleware('auth')->name("expenses");

// settings routes

Route::get('/settings', function(){
    return view('menus.settings.settings');
})->middleware('auth')->name("settings");

Route::get('/edit_profile', function(){
    return view('menus.settings.edit_profile');
})->middleware('auth')->name("edit_profile");




