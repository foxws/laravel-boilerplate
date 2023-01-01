<?php

namespace Domain\Shared\Support\Casts;

use Domain\Shared\Exceptions\CannotCastPrefixedId;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\PrefixedIds\PrefixedIds;
use Throwable;

class PrefixedIdCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): int
    {
        try {
            return PrefixedIds::findOrFail($value)->id;
        } catch (Throwable $e) {
            throw CannotCastPrefixedId::create($value);
        }
    }
}
