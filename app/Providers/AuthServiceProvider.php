<?php

namespace App\Providers;

use App\Policies\UrlAccessLogPolicy;
use App\Policies\UrlPolicy;
use App\Policies\UserPolicy;
use App\Url;
use App\UrlAccessLog;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Url::class => UrlPolicy::class,
        UrlAccessLog::class => UrlAccessLogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
