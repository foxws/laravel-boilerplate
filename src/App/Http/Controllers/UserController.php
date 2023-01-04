<?php

namespace App\Http\Controllers;

use Domain\Users\DataObjects\UserData;
use Domain\Users\Models\User;
use Domain\Users\QueryBuilders\UserIndexQuery;
use Illuminate\Http\Request;
use Spatie\LaravelData\CursorPaginatedDataCollection;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');

        $this->authorizeResource(User::class, 'user');
    }

    public function index(UserIndexQuery $query): CursorPaginatedDataCollection
    {
        $items = $query->jsonPaginate();

        return UserData::collection($items)
            ->include('email');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $model): UserData
    {
        return UserData::from($model);
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
