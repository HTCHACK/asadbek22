<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Contact\UserMessageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\Category\TourCategoryController;
use App\Http\Controllers\Auth\UserController;


Route::apiResource('galleries', GalleryController::class);
Route::apiResource('contacts', UserMessageController::class);
Route::apiResource('tour_categories', TourCategoryController::class);
Route::apiResource('tours', TourController::class);

Route::post('login', [LoginController::class, 'login']);
//asa
Route::post('login', [LoginController::class, 'login']);

Route::apiResource('users', UserController::class);