<?php

namespace App\Http\Controllers;

use Domain\Posts\DataObjects\PostData;
use Domain\Posts\Models\Post;
use Domain\Posts\QueryBuilders\PostIndexQuery;
use Illuminate\Http\Request;
use Spatie\LaravelData\CursorPaginatedDataCollection;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        $this->authorizeResource(Post::class, 'post');
    }

    public function index(PostIndexQuery $userQuery): CursorPaginatedDataCollection
    {
        return PostData::collection(
            $userQuery->jsonPaginate()
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $model): PostData
    {
        return PostData::from($model);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
