<?php

namespace Domain\Shared\Support\Casts;

use Domain\Shared\Exceptions\CannotCastUuid;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\Uncastable;
use Spatie\LaravelData\Support\DataProperty;
use Throwable;

class UuidCast implements Cast
{
    public function __construct(
        protected ?string $class = null
    ) {
    }

    public function cast(DataProperty $property, mixed $value, array $context): int
    {
        if ($this->class === null) {
            return Uncastable::create();
        }

        try {
            return app($this->class)::where('uuid', $value)->firstOrFail()->id;
        } catch (Throwable $e) {
            throw CannotCastUuid::create($value);
        }
    }
}
