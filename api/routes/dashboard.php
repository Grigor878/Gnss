<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::prefix('dashboard')
->middleware('auth')
->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});

