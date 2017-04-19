<?php

namespace App\Policies;

use App\Url;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create urls.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true; // Any connected user
    }

    /**
     * Determine whether the user can create urls.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function store(User $user)
    {
        return true; // Any connected user
    }

    /**
     * Determine whether the user can delete the url.
     *
     * @param \App\User $user
     * @param \App\Url  $url
     *
     * @return mixed
     */
    public function delete(User $user, Url $url)
    {
        return $user->id === $url->user_id; // Owner only
    }
}
