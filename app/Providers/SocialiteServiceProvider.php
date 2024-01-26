<?php

namespace App\Providers;

use App\Socialite\Socialite;
use Laravel\Socialite\SocialiteServiceProvider as SocialiteParentServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

class SocialiteServiceProvider extends SocialiteParentServiceProvider
{
    public function boot()
    {
        $socialiteWasCalled = resolve(SocialiteWasCalled::class);
        $socialiteWasCalled->extendSocialite(
            'slack',
            \App\Socialite\SlackProvider::class
        );
    }

    public function register()
    {
        $this->app->singleton('Laravel\Socialite\Contracts\Factory', function ($app) {
            return new Socialite($app);
        });
    }
}
