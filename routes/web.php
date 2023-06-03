<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RekamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// 
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('processlogin', [AuthController::class, 'processLogin'])->name('processlogin');
// 
Route::group(['middleware' => ['auth:web']], function() {
    Route::get('dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // 
    Route::resource('klinik', KlinikController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('rekam', RekamController::class);
    Route::resource('pemeriksaan', PemeriksaanController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('jabatan', JabatanController::class);
});


