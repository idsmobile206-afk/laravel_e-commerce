<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreAPIController;
use App\Http\Controllers\storeController;


//================= LOGIN ROUTES =================================

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorsController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// =================== Resource controller ======================

Route::resource( "products",ProductsController::class) ;

Route::resource('/store', storeController::class);

Route::get('/colors' ,[ ColorsController::class , 'index']) ;

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

Route::prefix('api')->group(function () {
    Route::get('data', [StoreAPIController::class, 'index']);
}) ;
