<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Middleware\UseAdminGuard;
use Illuminate\Support\Facades\Route;

Route::middleware([UseAdminGuard::class])->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', AdminDashboardController::class)->name('home');
    });
});
