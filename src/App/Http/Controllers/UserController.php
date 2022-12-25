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
        // $this->middleware('auth');

        $this->authorizeResource(User::class, 'user');
        $this->authorizeResource(UserData::class, 'user');
    }

    public function index(UserIndexQuery $userQuery): CursorPaginatedDataCollection
    {
        return UserData::collection(
            $userQuery->jsonPaginate()
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user): UserData
    {
        return UserData::from($user);
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
