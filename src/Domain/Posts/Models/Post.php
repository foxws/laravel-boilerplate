<?php

namespace Domain\Posts\Models;

use Database\Factories\PostFactory;
use Domain\Posts\Collections\PostCollection;
use Domain\Posts\QueryBuilders\PostQueryBuilder;
use Domain\Posts\States\PostState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\ModelStates\HasStates;
use Spatie\PrefixedIds\Models\Concerns\HasPrefixedId;

class Post extends Model
{
    use HasFactory;
    use HasPrefixedId;
    use HasStates;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'content',
        'summary',
        'state',
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
}
