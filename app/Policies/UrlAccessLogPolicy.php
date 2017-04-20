<?php

namespace App\Policies;

use App\UrlAccessLog;
use App\User;
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

    public function datatables(User $user)
    {
        return $user->is_admin;
    }
}
