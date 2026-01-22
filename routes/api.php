<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WorkSampleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\InvestmentOpportunityController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\MainSliderController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\SuccessPartnerController;
use App\Http\Controllers\Api\ReviewController;

Route::get('/work-samples', [WorkSampleController::class, 'index']);
Route::get('/work-samples/{id}', [WorkSampleController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/investment-opportunities', [InvestmentOpportunityController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/main-sliders', [MainSliderController::class, 'index']);
Route::get('/staff', [StaffController::class, 'index']);
Route::get('/success-partners', [SuccessPartnerController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);
