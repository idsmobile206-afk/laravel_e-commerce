<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\ProductsController;


//================= BASIC ROUTES =================================
Route::get('/', function () {
    return view('welcome');
});


Route::get('/greeting', function () {
    return "hello laravel";
});

//=================== ROUTES WITH PARAMETERS ====================

Route::get('/stagiaire/{name}', function ($name) {
    return "hello $name" ;
});


Route::get('/stagiaire/{name}/{phone}', function ($name , $phone) {
    return "hello $name , phone : $phone" ;
});


Route::get('/client/{name?}', function ($name = 'sara') {
    return "client name :  $name" ;
});


Route::apiResource('students', StudentController::class);

//=================== Routes with controller =====================


Route::get('/clients', function () {
    return view('clients');
});

Route::get('/clients', [clientsController::class , 'index']);




// =================== Resource controller ======================

Route::resource( "products",ProductsController::class) ;
Route::resource( "clients",clientsController::class) ;

// Route::resource('students', StudentController::class)->only(['index', 'show']);

// Route::resource('students', StudentController::class)->except(['destroy']);

// Route::prefix('admin')->group(function () {
//     Route::get('/users', [AdminController::class, 'index']);
//     Route::get('/settings', [AdminController::class, 'settings']);
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Admin Dashboard';
//     })->name('admin.dashboard');

//     Route::get('/users', function () {
//         return 'Manage Users';
//     })->name('admin.users');
// });

// Route::get('/profile', function () {
//     return 'User Profile';
// })->middleware('auth');

// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Admin Dashboard';
//     });

//     Route::get('/users', function () {
//         return 'Manage Users';
//     });
// });
// ====================== Fallback Routes ==========================

Route::fallback(function () {
    return view('errors.404') ;
});

// ================ view routes 
Route::view('/profile', 'user.profile', ['name' => 'Jouda']);

//================= redirect routes 
Route::redirect('/home', '/dashboard');