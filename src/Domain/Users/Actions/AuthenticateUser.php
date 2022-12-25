<?php

namespace Domain\Users\Actions;

use Domain\Users\DataObjects\UserData;
use Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;

class AuthenticateUser
{
    public function create(array $input): UserData
    {
        dd('foo');

        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', new Password],
        ])->validate();

        $user = User::firstWhere('email', $input['email']);

        if ($user && Hash::check($input['password'], $user->password)) {
            return UserData::from($user);
        }
    }
}
