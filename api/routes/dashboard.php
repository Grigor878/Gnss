<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SubcategoryController;



Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::prefix('dashboard')
->middleware('auth')
->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('product', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);

    Route::post('subcategories/deleteImage/{id}', [SubcategoryController::class, 'deleteImage']);
    Route::post('categories/deleteImage/{id}', [CategoryController::class, 'deleteImage']);
    Route::post('product/deleteImage/{id}', [ProductController::class, 'deleteImage']);
});

