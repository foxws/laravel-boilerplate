<?php

namespace App\Http\Controllers;

use Domain\Posts\DataObjects\PostData;
use Domain\Posts\Models\Post;
use Domain\Posts\QueryBuilders\PostIndexQuery;
use Spatie\LaravelData\PaginatedDataCollection;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        $this->authorizeResource(Post::class, 'post');
    }

    public function index(PostIndexQuery $query): PaginatedDataCollection
    {
        $items = $query->jsonPaginate();

        return PostData::collection($items)
            ->include(
                'id',
                'slug',
                'name',
                'created_at',
                'updated_at',
            );
    }

    public function store(PostData $data)
    {
        //
    }

    public function show(Post $model): PostData
    {
        return PostData::from($model)
            ->include(
                'id',
                'slug',
                'name',
                'created_at',
                'updated_at',
            );
    }

    public function update(PostData $data, Post $model)
    {
        //
    }

    public function destroy(Post $model)
    {
        //
    }
}
