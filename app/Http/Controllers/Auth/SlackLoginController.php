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
        session(['slack_data' => null]);
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
            session(['slack_error' => 'null_response']);
            return to_route("authError");
        };

        $org_id = config('slack.id');
        $org_name = config('slack.name');
        $slack_data['expected'] = ["id"=>$org_id, "name"=>$org_name];
        // add slack response to session data
        session(['slack_data' => $slack_data]);

        // append + flatten team data 
        try {
            $slack_team  = $slack_user["team"];
            $slack_data["team_id"] = $slack_team["id"];
            $slack_data["team_name"] = $slack_team["name"];
            $slack_data["team_domain"] = $slack_team["domain"];
        } catch (Exception $e) {
            session(['slack_error' => $e]);
        };

        if ($org_id === $slack_data["team_id"]) {
            // get user from slack response
            $user = User::where([
                ['slack_id', "=", $slack_data["id"]],
            ])->first();
            if ($user === null) {
                return to_route('register.slack');
            } else {
                return to_route('login.slack');
            };
        } else {
            session(['slack_error' => 'team-match']);
            return to_route("authError");
        };
    }

    public function create(Arr $loginData): Response
    {
        $slack_data = session('slack_data');
        if (!is_null($slack_data)) {
            $slack_id = session('slack_data')["id"];
            $user = User::where(['slack_id', "=", $slack_id])->first();
            if (is_null($user)){
                return Inertia::render('Auth/RegisterSlack', ['slack_data' => session('slack_data')]);
            };
        };
    }

    public function update(Request $request): Response
    {
        $slack_data = session('slack_data');
        return Inertia::render('Auth/LoginSlack', [
            'CanResetPassword' => true,
            'status' => "This slack account is already associated with a profile on NEPA Jobs Board",
            'slack_data' => $slack_data,
        ]);
    }

    public function handleError(Request $request): Response
    {
        $errorType = session(['slack_error']);
        $slackData = session(['slack_data']);
        return Inertia::render('Auth/AuthError', [
            'error_type' => $errorType,
            'slackData' => $slackData,
        ]);
    }
}
