<?php

namespace Domain\Users\Rules;

use Domain\Users\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UserExists implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return User::findByPrefixedId($value)?->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('The given user does not exists.');
    }
}
