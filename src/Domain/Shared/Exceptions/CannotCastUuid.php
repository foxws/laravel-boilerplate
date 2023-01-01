<?php

namespace Domain\Shared\Exceptions;

use Exception;

class CannotCastUuid extends Exception
{
    public static function create(mixed $value): self
    {
        return new self("Could not cast uuid: `{$value}` into an id");
    }
}
