<?php

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

    // Route::post('deleteImage', [ProductController::class, 'deleteImage']);
    Route::post('deleteImage/{id}', [ProductController::class, 'deleteImage']);
});

