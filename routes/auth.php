<?php

use App\Http\Controllers\AuthenticateController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('v1')->group(function () {
    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticateController::class, 'store'])
        ->middleware(array_filter([
            'guest',
            $limiter ? 'throttle:'.$limiter : null,
        ]))
        ->name('login');

    Route::post('/logout', [AuthenticateController::class, 'destroy'])
        ->middleware('auth:sanctum')
        ->name('logout');

    Route::get('/user', [AuthenticateController::class, 'show'])
        ->middleware('auth:sanctum')
        ->name('user');
});
