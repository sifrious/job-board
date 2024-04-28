<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;
use Inertia\Ssr\Response as SsrResponse;
use Laravel\Socialite\Facades\Socialite;

class SlackLoginController extends Controller
{
    public function redirectToSlack()
    {
        return Socialite::driver('slack')->redirect();
    }

    public function handleSlackCallback()
    {
        try {
            $slack_user = Socialite::driver('slack')->user();
            $slack_data = [
                'id' => $slack_user->id,
                'nickname' => $slack_user->nickname,
                'email' => $slack_user->email,
                'avatar' => $slack_user->avatar,
                'name' => $slack_user->name,
            ];
        } catch (Exception $e) {
            $slack_data = null;
            return to_route("auth-error", ["error-type" => 'response']);
        };

        // append + flatten team data 
        try {
            $slack_data["team_id"] = $slack_user["team"]["id"];
            $slack_data["team_name"] = $slack_user["team"]["name"];
            $slack_data["team_domain"] = $slack_user["team"]["domain"];
        } catch (Exception $e) {
            return to_route("auth-error", ["error-type" => 'team']);
        };

        $org_id = config('slack.id');
        $org_name = config('slack.name');

        if ($org_id === $slack_data["team_id"]) {
            $user = User::where([
                ['slack_id', "=", $slack_data["id"]],
            ])->first();
            if ($user === null) {
                return to_route('register.slack');
            } else {
                return to_route('login.slack');
            };
        } else {
            return to_route("auth-error", ["error-type" => 'team-match']);
        };
    }

    public function create(Arr $loginData): Response
    {
        $slack_data = session('slack_data');
        if (!is_null($slack_data)) {
            $slack_id = session('slack_data')["id"];
            $user = User::where(['slack_id', "=", $slack_id])->first();
            dump($slack_id);
            dump($user);
            if (!is_null($user)) {
                dd("okokok");
            } else {
                // dd("here");
                return Inertia::render('Auth/RegisterSlack', ['slack_data' => session('slack_data')]);
            }
        } else {
            dd("failed slack auth");
        }
    }

    public function update(Request $request): Response
    {
        return Inertia::render('Auth/LoginSlack', [
            'CanResetPassword' => true,
            'status' => "This slack account is already associated with an account",
        ]);
    }

    public function handleError(Request $request, str $errorType): Response
    {
        return Inertia::render('/', [
            'error-type' => $errorType,
        ]);
    }
}
