<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->prefix('api/v1')->group(function () {
    Route::apiResources([
        'users' => UserController::class,
        // 'posts' => PostController::class,
    ]);
});
