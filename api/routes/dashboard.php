<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;




Route::prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index']);
});

