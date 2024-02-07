<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InquiryController;
use App\Http\Controllers\Dashboard\OpportunityController;
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
    Route::resource('customers', CustomerController::class);

    Route::resource('opportunities', OpportunityController::class)
        ->middleware('manager');

    Route::post('opportunities/updateStatus', [OpportunityController::class, 'updateStatus']);
    Route::post('opportunities/addNote', [OpportunityController::class, 'addNote']);
    Route::post('opportunities/deleteNote', [OpportunityController::class, 'deleteNote']);
    Route::post('opportunities/attachFile', [OpportunityController::class, 'attachFile']);
    Route::post('opportunities/deleteFile', [OpportunityController::class, 'deleteFile']);


    Route::get('opportunities/byStatus/{status}', [OpportunityController::class, 'byStatus'])
        ->middleware('manager')
        ->name('byStatus');

    Route::post('opportunities/addTask', [OpportunityController::class, 'addTask']);
    Route::post('opportunities/completeTask', [OpportunityController::class, 'completeTask']);
    Route::post('opportunities/deleteTask', [OpportunityController::class, 'deleteTask']);

    Route::post('opportunities/closeOpportunity', [OpportunityController::class, 'closeOpportunity']);

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('users', UserController::class);

        Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries');
        Route::get('inquiries/{id}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::post('inquiries/{id}/reject', [InquiryController::class, 'reject'])->name('inquiries.reject');
        Route::post('inquiries/toOpportunity', [InquiryController::class, 'toOpportunity'])->name('inquiries.toOpportunity');
    });

    Route::post('product/deleteFile/{id}/{type}', [ProductController::class, 'deleteFile']);
    Route::post('categories/deleteImage/{id}/{bg_image}', [CategoryController::class, 'deleteImage']);
    Route::post('subcategories/deleteImage/{id}/{bg_image}', [SubcategoryController::class, 'deleteImage']);
    Route::post('partners/deleteImage/{id}', [PartnerController::class, 'deleteImage']);

});

