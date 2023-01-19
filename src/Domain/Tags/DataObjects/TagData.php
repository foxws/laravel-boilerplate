<?php

namespace Domain\Tags\DataObjects;

use Domain\Shared\Support\Casts\PrefixedIdCast;
use Domain\Tags\Enums\TagType;
use Domain\Tags\Models\Tag;
use Domain\Tags\Rules\TagExists;
use Illuminate\Support\Carbon;
use Spatie\Enum\Laravel\Rules\EnumRule;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class TagData extends Data
{
    public function __construct(
        #[WithCast(PrefixedIdCast::class)]
        public string $id,
        public Lazy|string $name,
        public Lazy|string $slug,
        public Lazy|string $description,
        public Lazy|TagType $type,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
    ) {
    }

    public static function fromModel(Tag $model): self
    {
        return new self(
            id: $model->getRouteKey(),
            name: Lazy::create(fn () => $model->name),
            slug: Lazy::create(fn () => $model->slug),
            description: Lazy::create(fn () => $model->description),
            type: Lazy::create(fn () => $model->type),
            created_at: Lazy::create(fn () => $model->created_at),
            updated_at: Lazy::create(fn () => $model->updated_at),
        );
    }

    public static function authorize(): bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            'id' => ['required', 'string', new TagExists()],
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'nullable', 'string', 'max:2048'],
            'type' => ['sometimes', 'nullable', 'string', new EnumRule(TagType::class)],
        ];
    }
}
