<?php

namespace Domain\Tags\Policies;

use Domain\Tags\Models\Tag;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TagPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return true;
    }

    public function view(User $user, Tag $model): Response|bool
    {
        return true;
    }

    public function create(User $user): Response|bool
    {
        return false;
    }

    public function update(User $user, Tag $model): Response|bool
    {
        return false;
    }

    public function delete(User $user, Tag $model): Response|bool
    {
        return false;
    }

    public function restore(User $user, Tag $model): Response|bool
    {
        return false;
    }

    public function forceDelete(User $user, Tag $model): Response|bool
    {
        return false;
    }
}
