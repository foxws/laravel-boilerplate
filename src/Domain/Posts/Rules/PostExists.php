<?php

namespace Domain\Posts\Rules;

use Domain\Posts\Models\Post;
use Illuminate\Contracts\Validation\Rule;

class PostExists implements Rule
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
        return Post::findByPrefixedId($value)?->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('The given post does not exists.');
    }
}
