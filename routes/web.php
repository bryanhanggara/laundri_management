<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Service\CustomerController;
use App\Http\Controllers\Service\ServicesController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::prefix('layanan')->group(function(){
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('paket-layanan', [ServicesController::class, 'index'])->name('package.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
