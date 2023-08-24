<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticationController::class, 'store'])
        ->name('login.store');
});
