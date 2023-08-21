<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::prefix('dashboard')
->middleware('auth')
->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('product', ProductController::class);
    Route::resource('categories', CategoryController::class);

    Route::post('categories/deleteImage/{id}', [CategoryController::class, 'deleteImage']);
    Route::post('product/deleteImage/{id}', [ProductController::class, 'deleteImage']);
});

