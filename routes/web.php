<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CaretakerController;
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

Route::put('/assignTenant/{property}',[propertiesController::class,'assignTenant'])->middleware('auth')->name("assignTenant");

Route::put('/unAssignTenant/{property}',[propertiesController::class,'unAssignTenant'])->middleware('auth')->name("unAssignTenant");

Route::put('/propertyStatus/{property}',[propertiesController::class,'toggleStatus'])->middleware('auth')->name('propertyStatus');


// careTaker routes

Route::post('/createAndStore/{property}',[CaretakerController::class,'createAndStore'])->middleware('auth')->name("createAndStore");

Route::post('/assignCareTaker/{property}',[CaretakerController::class,'assignCareTaker'])->middleware('auth')->name("assignCareTaker");

Route::put('/unAssignCaretaker/{property}',[CaretakerController::class,'unAssignCaretaker'])->middleware('auth')->name("unAssignCaretaker");

Route::put('/assignCaretakerFromList/{property}',[CaretakerController::class,'assignCaretakerFromList'])->middleware('auth')->name("assignCaretakerFromList");


// tenants routes

Route::get('/tenants', [tenantsController::class,'display'])->middleware('auth')->name("tenants");

Route::get('/createTenants', [tenantsController::class,'create'])->middleware('auth')->name("createTenants");

Route::post('/storeTenants', [tenantsController::class,'store'])->middleware('auth')->name("storeTenants");

Route::get('/viewTenants/{tenant}', [tenantsController::class,'show'])->middleware('auth')->name("showTenants");

Route::get('/editTenants/{tenant}', [tenantsController::class,'edit'])->middleware('auth')->name("editTenants");

Route::put('/updateTenants/{tenant}', [tenantsController::class,'update'])->middleware('auth')->name("updateTenants");

Route::put('/tenantStatus/{tenant}',[tenantsController::class,'toggleStatus'])->middleware('auth')->name('tenantStatus');

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




