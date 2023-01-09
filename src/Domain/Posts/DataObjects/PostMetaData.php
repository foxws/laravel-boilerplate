<?php

namespace Domain\Posts\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class PostMetaData extends Data
{
    public function __construct(
        public Lazy|string $color,
    ) {
    }

    public static function fromModel(SchemalessAttributes $meta): self
    {
        return new self(
            color: Lazy::create(fn () => $meta->get('color')),
        );
    }

    public static function authorize(): bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            'color' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
