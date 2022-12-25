<?php

namespace Domain\Users\Actions;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Rules\Password;

class UpdateUserPassword implements UpdatesUserPasswords
{
    public function update($user, array $input): void
    {
        Validator::make($input,
            [
                'current_password' => ['required', 'string', 'current_password:web'],
                'password' => ['required', 'string', new Password, 'confirmed'],
            ],
            [
                'current_password.current_password' => __('The provided password does not match your current password.'),
            ]
        )->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
