<?php

namespace App\Providers;

use Illuminate\Support\Facades\Date;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Carbon\Carbon;
use Nette\Utils\DateTime;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        //
        Passport::tokensExpireIn(new DateTime('9999-12-31'));
        Passport::refreshTokensExpireIn(new DateTime('9999-12-31'));
        Passport::personalAccessTokensExpireIn(new DateTime('9999-12-31'));
    }
}
