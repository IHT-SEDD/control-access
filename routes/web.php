<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterData\MasterDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    #region Master Data Routes
    Route::prefix('master')->controller(MasterDataController::class)->group(function () {
        Route::get('/{type}', 'index')->name('master.data.view');
        Route::get('/{type}/data', 'data')->name('master.data.data');
    });

    Route::put('/door/{doorId}/toggle', [AccessController::class, 'toggle'])->name('door.toggle');

});

require __DIR__ . '/auth.php';
