<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\ProfileController;
use App\Http\Controllers\Web\Auth\NewPasswordController;
use App\Http\Controllers\Web\Auth\VerifyEmailController;
use App\Http\Controllers\Web\Auth\ChangePasswordController;
// use App\Http\Controllers\Web\Auth\PasswordController;
use App\Http\Controllers\Web\Auth\RegisteredUserController;
use App\Http\Controllers\web\auth\CustomEmailVerifyController;
use App\Http\Controllers\Web\Auth\PasswordResetLinkController;
use App\Http\Controllers\Web\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Web\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Web\Auth\EmailVerificationNotificationController;
   
Route::middleware('guest:web')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

    Route::get('verify-email/{id}/{hash}', [CustomEmailVerifyController::class, '__invoke'])
                ->middleware(['throttle:6,1']);


});

Route::middleware('auth:web')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');


    Route::get('change-password', [ChangePasswordController::class, 'show'])->name('change.password');
    Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');

    Route::post('profile', [ProfileController::class, 'store'])->name('profile');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
