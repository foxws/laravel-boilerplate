<?php

namespace Domain\Posts\Policies;

use Domain\Posts\Models\Post;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return true;
    }

    public function view(User $user, Post $model): Response|bool
    {
        return true;
    }

    public function create(User $user): Response|bool
    {
        return false;
    }

    public function update(User $user, Post $model): Response|bool
    {
        return false;
    }

    public function delete(User $user, Post $model): Response|bool
    {
        return false;
    }

    public function restore(User $user, Post $model): Response|bool
    {
        return false;
    }

    public function forceDelete(User $user, Post $model): Response|bool
    {
        return false;
    }
}
