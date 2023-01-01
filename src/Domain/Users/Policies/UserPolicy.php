<?php

namespace Domain\Users\Policies;

use Domain\Users\Models\User;
use Domain\Users\Models\User as UserModel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return true;
    }

    public function view(User $user, UserModel $model): Response|bool
    {
        dd('true');

        return true;
    }

    public function create(User $user): Response|bool
    {
        return false;
    }

    public function update(User $user, UserModel $model): Response|bool
    {
        return false;
    }

    public function delete(User $user, UserModel $model): Response|bool
    {
        return false;
    }

    public function restore(User $user, UserModel $model): Response|bool
    {
        return false;
    }

    public function forceDelete(User $user, UserModel $model): Response|bool
    {
        return false;
    }
}
