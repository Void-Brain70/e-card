<?php

use App\Http\Controllers\Auth\OtpController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::middleware(['auth', 'throttle:6,1'])->group(function () {
    Route::get('/otp/verify', [OtpController::class, 'show'])->name('otp.verify');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify.submit');
    Route::post('/otp/resend', [OtpController::class, 'resend'])->name('otp.resend');
});

require __DIR__.'/settings.php';
