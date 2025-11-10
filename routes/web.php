<?php

use App\Http\Controllers\MasterData\MasterDataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    #region Master Data Routes
    Route::prefix('master')->controller(MasterDataController::class)->group(function () {
        Route::get('/{type}', 'view')->name('master.data.view');
    });
});

require __DIR__ . '/auth.php';
