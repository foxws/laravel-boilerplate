<?php

namespace Domain\Users\Policies;

use Domain\Users\Models\User;
use Domain\Users\Models\User as UserModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserModel $model)
    {
        dd('true');

        return true;
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserModel $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserModel $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserModel $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserModel $model)
    {
        //
    }
}
