<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/portal', function () {
    return view('portal');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/sewazoom', function () {
    return view('fitur.sewazoom');
});
Route::get('/inventaris', function () {
    return view('fitur.inventaris');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/aksesinternet', function () {
    return view('fitur.aksesinternet');
});
Route::get('/revisidata', function () {
    return view('fitur.revisidata');
});
Route::get('/aksesprogram', function () {
    return view('fitur.aksesprogram');
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
?>