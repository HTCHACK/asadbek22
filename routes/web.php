<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Contact\UserMessageController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderTourController;
use App\Http\Controllers\Tour\TourCommentsController;
use App\Http\Controllers\Tour\TourController;

Auth::routes([
    'register' => false, // Registration Routes...

    'reset' => false, // Password Reset Routes...

    'verify' => false, // Email Verification Routes...
]);


Route::prefix('/admin')->group(function () {

    Route::get('{any}', function () {
        return view('admin.app');
    })->where('any', '.*');

});


Route::resource('ordertours', OrderTourController::class)->except('store');

Route::resource('orders', OrderController::class)->only('create', 'index', 'store');

Route::resource('contacts', UserMessageController::class)->only('store');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contacts/page', [UserMessageController::class, 'userSendMessagePage'])->name('contactspage.index');

Route::get('/galleries/page', [GalleryController::class, 'userPageGallery'])->name('galleriesuser.index');

Route::get('/tourpackages', [TourController::class , 'tourUserPage'])->name('tourspackages.index');

Route::get('/tourpackages/{id}', [TourController::class, 'show'])->name('tourspackages.show');

Route::post('/ordertours', [OrderTour::class, 'store'])->name('store.tourorder');

Route::post('user/comments/{id}', [TourCommentsController::class, 'store'])->name('usercomments.create');

