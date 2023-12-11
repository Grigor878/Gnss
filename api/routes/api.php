<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\SubcategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getHeaderItems/{lang}', [HomeController::class, 'getHeaderItems']);

Route::get('getCategories/{lang}', [CategoryController::class, 'getCategories']);

Route::get('getSubcategories/{id}/{lang}', [SubcategoryController::class, 'getSubcategories']);

Route::get('getChildSubcategories/{id}/{lang}', [SubcategoryController::class, 'getChildSubcategories']);

Route::get('getAllSubCategories/{lang}', [SubcategoryController::class, 'getAllSubCategories']);

Route::get('getAllChildSubCategories/{lang}', [SubcategoryController::class, 'getAllChildSubCategories']);

Route::get('getSubcategoryProducts/{id}/{lang}', [SubcategoryController::class, 'getSubcategoryProducts']);

Route::get('getSingleProduct/{id}/{lang}', [ProductController::class, 'getSingleProduct']);

Route::get('getPartners', [PartnerController::class, 'getPartners']);

// Route::post('startOrder', [OrderController::class, 'startOrder']);
Route::post('newInquiry', [InquiryController::class, 'index']);
