<?php

namespace Domain\Tags\Models;

use Database\Factories\TagFactory;
use Domain\Tags\Collections\TagCollection;
use Domain\Tags\QueryBuilders\TagQueryBuilder;
use Domain\Tags\States\TagState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\ModelStates\HasStates;
use Spatie\Tags\Tag as BaseTag;

class Tag extends BaseTag
{
    use HasFactory;
    use HasStates;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
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
        'state' => TagState::class,
    ];

    protected static function newFactory(): TagFactory
    {
        return TagFactory::new();
    }

    public function newEloquentBuilder($query): TagQueryBuilder
    {
        return new TagQueryBuilder($query);
    }

    public function newCollection(array $models = []): TagCollection
    {
        return new TagCollection($models);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
