<?php

namespace App\Http\Controllers;

use Domain\Users\DataObjects\UserData;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

class AuthenticateController extends AuthenticatedSessionController
{
    public function show(Request $request): UserData
    {
        $user = UserData::from($request->user());

        return $user
            ->include('email', 'permissions', 'roles', 'settings');
    }

    public function destroy(Request $request): LogoutResponse
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return app(LogoutResponse::class);
    }
}
