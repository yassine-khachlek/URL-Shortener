<?php

namespace App\Policies;

use App\User;
use App\UrlAccessLog;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlAccessLogPolicy
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
}
