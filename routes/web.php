<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WoKikppcController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('superadmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadmin.home')->middleware('role');
// Route::get('adminopd/home', [App\Http\Controllers\HomeController::class, 'adminopdHome'])->name('adminopd.home')->middleware('role');
// Route::get('assessor/home', [App\Http\Controllers\HomeController::class, 'assessorHome'])->name('assessor.home')->middleware('role');
Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/', function () {
        return redirect('/login');
    });
    
    Auth::routes(
        [
        'register' => false, // Register Routes...
        'reset' => false, // Reset Password Routes...
        'verify' => false, // Email Verification Routes...
        ],
    );
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    // Route::get('/profile/setting', [App\Http\Controllers\ProfileController::class, 'setting_profile'])->name('setting_profile');
    // Route::post('/profile/setting/store', [App\Http\Controllers\ProfileController::class, 'store_form_setting_profile'])->name('store_form_setting_profile');
    
    Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
        Route::get('superadmin/home', [App\Http\Controllers\HomeController::class, 'superadminHome'])->name('superadmin.home');
        Route::get('superadmin/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
        Route::get('superadmin/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
    });
    
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
        Route::get('admin/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
        Route::get('admin/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
    });
    
    Route::group(['middleware' => ['auth', 'role:user']], function () {
        Route::get('user/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('user.home');
        Route::get('user/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
        Route::get('user/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
    });
});

Route::get('/tes', 'App\Http\Controllers\TesController@tes')->name('tes');