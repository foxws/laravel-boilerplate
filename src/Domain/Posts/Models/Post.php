<?php

namespace Domain\Posts\Models;

use Database\Factories\PostFactory;
use Domain\Posts\Collections\PostCollection;
use Domain\Posts\QueryBuilders\PostQueryBuilder;
use Domain\Posts\States\PostState;
use Domain\Users\Concerns\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\ModelStates\HasStates;
use Spatie\PrefixedIds\Models\Concerns\HasPrefixedId;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;
    use HasPrefixedId;
    use HasStates;
    use HasTags;
    use HasTranslatableSlug;
    use HasTranslations;
    use HasUser;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'content',
        'summary',
        'published_at',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        //
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'state' => PostState::class,
        'published_at' => 'datetime',
    ];

    /**
     * @var array<int, string>
     */
    protected $translatable = [
        'name',
        'slug',
        'content',
        'summary',
    ];

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    public function newEloquentBuilder($query): PostQueryBuilder
    {
        return new PostQueryBuilder($query);
    }

    public function newCollection(array $models = []): PostCollection
    {
        return new PostCollection($models);
    }

    public function getRouteKeyName(): string
    {
        return 'prefixed_id';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
