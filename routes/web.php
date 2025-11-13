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

//=================== Routes with controller =====================


Route::get('/clients', function () {
    return view('clients');
});

Route::get('/clients', [clientsController::class , 'index']);

// =================== Resource controller ======================

Route::resource( "products",ProductsController::class) ;
Route::resource( "clients",clientsController::class) ;
