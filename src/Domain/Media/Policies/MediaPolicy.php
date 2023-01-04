<?php

namespace Domain\Posts\Policies;

use Domain\Media\Models\Media;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MediaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response|bool
    {
        return false;
    }

    public function view(User $user, Media $model): Response|bool
    {
        return true;
    }

    public function create(User $user): Response|bool
    {
        return false;
    }

    public function update(User $user, Media $model): Response|bool
    {
        return false;
    }

    public function delete(User $user, Media $model): Response|bool
    {
        return false;
    }

    public function restore(User $user, Media $model): Response|bool
    {
        return false;
    }

    public function forceDelete(User $user, Media $model): Response|bool
    {
        return false;
    }
}
