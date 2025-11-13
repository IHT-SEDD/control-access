<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Door\AccessController;
use App\Http\Controllers\MasterData\MasterDataController;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    #region Master Data Routes
    Route::prefix('master')->controller(MasterDataController::class)->group(function () {
        Route::get('/{type}', 'index')->name('master.data.view');
        Route::get('/{type}/data', 'data')->name('master.data.data');
        Route::post('/{type}/add-data', 'store')->name('master.data.store');
    });

    #region Access Door Routes
    Route::prefix('door')->controller(AccessController::class)->group(function () {
        Route::get('/access/{doorId}/{action}', 'accessControl')->name('door.access-control');
    });


       Route::prefix('select')->group(function () {
            Route::get('/{option}', [SelectController::class, 'selectOptions'])->name('select.options');
        });
});

require __DIR__ . '/auth.php';
