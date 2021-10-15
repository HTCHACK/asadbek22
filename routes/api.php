<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Contact\UserMessageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Tour\TourController;
use App\Http\Controllers\Category\TourCategoryController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Tour\TourCommentsController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use App\Models\User;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Function
Route::apiResource('galleries', GalleryController::class);
Route::apiResource('contacts', UserMessageController::class);
Route::apiResource('tour_categories', TourCategoryController::class);
Route::apiResource('tours', TourController::class);
Route::apiResource('comments', TourCommentsController::class);
Route::put('unconfirm/{id}', [TourCommentsController::class, 'unconfirm']);
Route::apiResource('users', UserController::class);
Route::apiResource('orders', OrderController::class);
