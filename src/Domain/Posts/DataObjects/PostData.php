<?php

namespace Domain\Posts\DataObjects;

use Domain\Posts\Enums\PostType;
use Domain\Posts\Models\Post;
use Domain\Posts\Rules\PostExists;
use Domain\Shared\Support\Casts\PrefixedIdCast;
use Domain\Tags\DataObjects\TagData;
use Domain\Tags\Rules\TagExists;
use Domain\Users\DataObjects\UserData;
use Illuminate\Support\Carbon;
use Spatie\Enum\Laravel\Rules\EnumRule;
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
        public Lazy|string $slug,
        public Lazy|string $name,
        public Lazy|string $content,
        public Lazy|string $summary,
        public Lazy|PostType $type,
        public Lazy|PostMetaData $meta,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
        public Lazy|UserData $user,
        #[DataCollectionOf(TagData::class)]
        public Lazy|DataCollection $tags,
    ) {
    }

    public static function fromModel(Post $model): self
    {
        return new self(
            id: $model->getRouteKey(),
            slug: Lazy::create(fn () => $model->slug),
            name: Lazy::create(fn () => $model->name),
            content: Lazy::create(fn () => $model->content),
            summary: Lazy::create(fn () => $model->summary),
            type: Lazy::create(fn () => $model->type),
            meta: Lazy::create(fn () => PostMetaData::from($model->meta)),
            created_at: Lazy::create(fn () => $model->created_at),
            updated_at: Lazy::create(fn () => $model->updated_at),
            user: Lazy::create(fn () => UserData::from($model->user)),
            tags: Lazy::create(fn () => TagData::collection($model->tags)),
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
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'content' => ['sometimes', 'nullable', 'string', 'max:2048'],
            'summary' => ['sometimes', 'nullable', 'string', 'max:1024'],
            'type' => ['sometimes', 'required', new EnumRule(PostType::class)],
            'tags' => ['exclude_without:tags', 'nullable', 'array'],
            'tags.*.id' => ['required', 'string', new TagExists()],
        ];
    }
}
