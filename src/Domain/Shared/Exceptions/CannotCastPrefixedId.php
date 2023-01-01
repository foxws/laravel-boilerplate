<?php

namespace Domain\Shared\Exceptions;

use Exception;

class CannotCastPrefixedId extends Exception
{
    public static function create(mixed $value): self
    {
        return new self("Could not cast prefixed id: `{$value}` into an id");
    }
}
