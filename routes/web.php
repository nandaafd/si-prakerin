<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WoKikppcController;
use App\Models\WoKikppc;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
// Siswa
Route::get('/generate_siswa', [SiswaController::class, 'generate_siswa']);
Route::get('/generate_dbf', [SiswaController::class, 'generate_dbf']);
Route::get('/write_dbf', [SiswaController::class, 'write_dbf']);

// WO Kikppc
Route::get('/WO', [WoKikppcController::class, 'index']);
// Route::get('/WO2', [WoKikppcController::class, 'index2']);

Route::get('/generate_wokikppc', [WoKikppcController::class, 'generate_wokikppc']);
Route::get('/dbf_wokikppc', [WoKikppcController::class, 'dbf_wokikppc']);
Route::get('/write_wokikppc', [WoKikppcController::class, 'write_wokikppc']);
