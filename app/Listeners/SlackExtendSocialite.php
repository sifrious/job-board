<?php

namespace App\Listeners;

use SocialiteProviders\Manager\SocialiteWasCalled;

class SlackExtendSocialite
{
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite(
            'slack',
            \App\Providers\SocialiteServiceProvider::class
        );
    }
}
