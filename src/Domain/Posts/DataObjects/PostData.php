<?php

namespace Domain\Posts\DataObjects;

use Domain\Posts\Models\Post;
use Domain\Posts\Rules\PostExists;
use Domain\Shared\Support\Casts\PrefixedIdCast;
use Domain\Tags\DataObjects\TagData;
use Domain\Tags\Rules\TagExists;
use Domain\Users\DataObjects\UserData;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;

class PostData extends Data
{
    public function __construct(
        #[WithCast(PrefixedIdCast::class)]
        public string $id,
        public Lazy|string $name,
        public Lazy|string $slug,
        public Lazy|string $content,
        public Lazy|string $summary,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
        #[DataCollectionOf(TagData::class)]
        public Lazy|DataCollection $tags,
        public Lazy|UserData $user,
    ) {
    }

    public static function fromModel(Post $model): self
    {
        return new self(
            id: $model->getRouteKey(),
            name: Lazy::create(fn () => $model->name),
            slug: Lazy::create(fn () => $model->slug),
            content: Lazy::create(fn () => $model->content),
            summary: Lazy::create(fn () => $model->summary),
            created_at: Lazy::create(fn () => $model->created_at),
            updated_at: Lazy::create(fn () => $model->updated_at),
            tags: Lazy::create(fn () => TagData::collection($model->tags)),
            user: Lazy::create(fn () => UserData::from($model->user)),
        );
    }

    public static function authorize(): bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            'id' => ['required', 'string', new PostExists()],
            'name' => ['sometimes', 'string', 'max:255'],
            'content' => ['sometimes', 'string', 'max:2048'],
            'summary' => ['sometimes', 'string', 'max:1024'],
            'tags' => ['exclude_without:tags', 'nullable', 'array'],
            'tags.*.id' => ['required', 'string', new TagExists()],
        ];
    }
}
