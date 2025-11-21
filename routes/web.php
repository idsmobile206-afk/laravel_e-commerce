<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\storeController;


//================= BASIC ROUTES =================================
Route::get('/', function () {
    return view('welcome');
});




// =================== Resource controller ======================

Route::resource( "products",ProductsController::class) ;

Route::resource('/store', storeController::class);



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
