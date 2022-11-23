<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WoKikppcController;
use App\Http\Controllers\Auth\AuthController;
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
Route::group(['middleware' => 'prevent-back-history'],function(){
    // Route::group(['prefix' => 'auth'], function() {
        // Route::get('tes', 'App\Http\Controllers\TesController@tes');
        Route::get('/', function () {
            return redirect('/login');
        });
        // Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
        Route::post('login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
        Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
        Route::group(['middleware' => 'auth:api'], function() {
            Route::get('superadmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadmin.home');
            Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
            Route::get('user/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('user.home');
            Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout');
            Route::get('user', 'App\Http\Controllers\Auth\AuthController@user');
            Route::get('superadmin/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
            Route::get('admin/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
            Route::get('user/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
            Route::get('superadmin/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
            Route::get('admin/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
            Route::get('user/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
        });
    // });
});