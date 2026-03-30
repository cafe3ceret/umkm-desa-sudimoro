<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PotensiController as AdminPotensiController;
use App\Http\Controllers\Admin\PotensiDesaController as AdminPotensiDesaController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/potensi', [PotensiController::class, 'index'])->name('potensi');
Route::get('/potensi-desa', [PotensiDesaController::class, 'index'])->name('potensi-desa');
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm');
Route::get('/map', [MapController::class, 'index'])->name('map');

/*
|--------------------------------------------------------------------------
| Auth Routes — Login/Logout Only
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected — Auth Required)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('sliders', SliderController::class);
    Route::resource('potensis', AdminPotensiController::class);
    Route::resource('potensi-desa', AdminPotensiDesaController::class);
    Route::resource('products', AdminProductController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
