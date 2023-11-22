<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\SubcategoryController;
use App\Http\Controllers\Dashboard\UserController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::prefix('dashboard')
->middleware('auth')
->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('orders', OrderController::class);

    Route::post('orders/updateStatus', [OrderController::class, 'updateStatus']);

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('users', UserController::class);
    });

    Route::post('product/deleteFile/{id}/{type}', [ProductController::class, 'deleteFile']);
    Route::post('categories/deleteImage/{id}', [CategoryController::class, 'deleteImage']);
    Route::post('subcategories/deleteImage/{id}', [SubcategoryController::class, 'deleteImage']);
    Route::post('partners/deleteImage/{id}', [PartnerController::class, 'deleteImage']);
});

