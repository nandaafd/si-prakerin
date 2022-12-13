<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WoKikppcController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::group(['middleware' => 'prevent-back-history'],function(){
    
    Auth::routes(
        [
        'register' => false, // Register Routes...
        'reset' => false, // Reset Password Routes...
        'verify' => false, // Email Verification Routes...
        ],
    );
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
        // Route::get('superadmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadmin.home');
    });
    
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
    });
    
    Route::group(['middleware' => ['auth', 'role:user']], function () {
    });
});

Route::get('/failedLogin', 'App\Http\Controllers\ErrorController@failedLogin')->name('failedLogin');