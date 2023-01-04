<?php

namespace Domain\Tags\Rules;

use Domain\Tags\Models\Tag;
use Illuminate\Contracts\Validation\Rule;

class TagExists implements Rule
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
        return Tag::findBySlugOrFail($value)?->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('The given tag does not exists.');
    }
}
