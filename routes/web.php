<?php

use App\Http\Controllers\CompanySettingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class);

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
        Route::resource('packages', PackageController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::singleton('settings', CompanySettingController::class)->only('edit', 'update');
    });
});

require __DIR__ . '/auth.php';
