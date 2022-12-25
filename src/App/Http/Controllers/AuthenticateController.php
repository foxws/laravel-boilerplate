<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

class AuthenticateController extends AuthenticatedSessionController
{
    public function destroy(Request $request): LogoutResponse
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return app(LogoutResponse::class);
    }
}
