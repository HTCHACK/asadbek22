<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Auth::routes([
    'register' => false, // Registration Routes...

    'reset' => false, // Password Reset Routes...

    'verify' => false, // Email Verification Routes...
]);

Route::get('/',[HomeController::class, 'index'])->name('home');


Route::prefix('/admin')->group(function () {

    Route::get('{any}', function () {
        return view('admin.app');
    })->where('any', '.*');

});
