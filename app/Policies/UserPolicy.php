<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the urlAccessLog.
     *
     * @param  \App\User  $user
     * @param  \App\UrlAccessLog  $urlAccessLog
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can edit the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $User
     * @return mixed
     */
    public function edit(User $user, User $userToEdit)
    {
        return $user->id === $userToEdit->id; // Owner only
    }

    /**
     * Determine whether the user can edit the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $User
     * @return mixed
     */
    public function update(User $user, User $userToUpdate)
    {
        return $user->id === $userToUpdate->id; // Owner only
    }
}
