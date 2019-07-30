<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Team' => 'App\Policies\TeamPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // - Custom user guards
        // - To authenticate using the request
        \Auth::viaRequest('email', function ($request) {
            return \App\User::where('email', $request->email)->first();
        });
        // Sau do, phai dang ky custom guard nay cua minh o config/auth.php

    }
}
