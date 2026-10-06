<?php

use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/dashboard/settings', [SiteSettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/dashboard/settings', [SiteSettingController::class, 'update'])->name('admin.settings.update');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
