<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\LivrosController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
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

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::controller(SeriesController::class)->group(function () {
        Route::get('/series', 'index')->name('series.index');
        Route::get('/series/create', 'create')->name('series.create');
        Route::post('/series/store', 'store')->name('series.store');
        Route::delete('/series/destroy/{serie}', 'destroy')->whereNumber('series')->name('series.destroy');
        Route::get('series/edit/{serie}', 'edit')->name('series.edit');
        Route::put('series/update/{serie}', 'update')->name('series.update');
    });

    Route::controller(LivrosController::class)->group(function () {
        Route::get('/livros', 'index')->name('livros.index');
        Route::get('/livros/create', 'create')->name('livros.create');
        Route::post('/livros/store', 'store')->name('livros.store');
        Route::delete('/livros/destroy/{serie}', 'destroy')->whereNumber('livros')->name('livros.destroy');
        Route::get('livros/edit/{serie}', 'edit')->name('livros.edit');
        Route::put('livros/update/{serie}', 'update')->name('livros.update');
    });
});
