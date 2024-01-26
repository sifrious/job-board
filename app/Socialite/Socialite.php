<?php

namespace App\Socialite;

use Laravel\Socialite\SocialiteManager;

class Socialite extends SocialiteManager
{
    public function createSlackDriver()
    {
        $config = config('services.slack');

        return $this->buildProvider(SlackProvider::class, $config);
    }
}
