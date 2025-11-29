<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreAPIController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorsController;
// use Illuminate\Support\Facades\Route;

//================= LOGIN ROUTES =================================


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// =================== Resource controller ======================



// All routes inside this group require authentication
Route::middleware(['auth'])->group(function () {

    // Resource routes for products
    Route::resource('products', ProductsController::class);

    // Product images routes
    Route::get('/products/{id}/images', [ProductsController::class, 'imagesView'])
        ->name('products.images');

    Route::post('/products/{id}/images', [ProductsController::class, 'imagesStore'])
        ->name('products.images.store');

    Route::get('/colors' ,[ ColorsController::class , 'index']) ;

});


Route::resource('/store', storeController::class);




// ====================== Fallback Routes ==========================

Route::fallback(function () {
    return view('errors.404') ;
});

// routes/api.php
Route::prefix('api')->group(function () {
    
    // Route::post('/register', [ApiAuthController::class, 'register']);
    // Route::post('/login',    [ApiAuthController::class, 'login']);

    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::post('/logout', [ApiAuthController::class, 'logout']);
    // });

    Route::post('/register', [APIAuthController::class, 'register']);
Route::post('/login', [APIAuthController::class, 'login']);

Route::resource('/data', StoreAPIController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [APIAuthController::class, 'logout']);
});
});


