<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function() {
    Route::get('tes', 'App\Http\Controllers\TesController@tes');
    Route::post('login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
    // Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('superadmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadmin.home');
        Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
    });
});