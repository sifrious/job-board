<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;
use Laravel\Socialite\Facades\Socialite;

class SlackLoginController extends Controller
{
    public function redirectToSlack()
    {
        return Socialite::driver('slack')->redirect();
    }

    public function handleSlackCallback()
    {
        $slack_user = Socialite::driver('slack')->user();

        try {
            $slack_data = [
                'id' => $slack_user->id,
                'nickname' => $slack_user->nickname,
                'email' => $slack_user->email,
                'avatar' => $slack_user->avatar,
                'name' => $slack_user->name,
            ];
        } catch (Exception $e) {
            $slack_data = null;
            dump($e);
            dd("no slack data recieved");
            // TODO EARLY RETURN
        };

        // append + flatten team data 
        try {
            $slack_data["team_id"] = $slack_user["team"]["id"];
            $slack_data["team_name"] = $slack_user["team"]["name"];
            $slack_data["team_domain"] = $slack_user["team"]["domain"];
        } catch (Exception $e) {
            dump($e);
            dd("no team data recieved");
            // TODO EARLY RETURN
        };

        $org_id = config('slack.id');
        $org_name = config('slack.name');

        if ($org_id === $slack_data["team_id"] && $org_name === $slack_data["team_name"]) {
            // matches
            session(['slack_data' => $slack_data]);
            $user = User::where([
                ['slack_id', "=", $slack_data["id"]],
            ])->first();
            if ($user === null) {
                return to_route('register.slack');
            } else {
                return to_route('login.slack');
            };
        } else {
            // doesn't match
            return to_route('welcome', ['failedSlackLogin' => true]);
        };
    }

    public function create(Arr $loginData): Response
    {
        return Inertia::render('Auth/RegisterSlack', ['slack_data' => session('slack_data')]);
    }

    public function store(Arr $loginData, Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // override slack nickname
        $nickname = '';
        if (!empty($request->nickname)) {
            $nickname = $request->nickname;
        } elseif (!empty($request->slack_nickname)) {
            $nickname = $request->slack_nickname;
        }

        if ($request->role === '') {
            $role = 'demo';
        } else {
            $role = 'nepatech';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'slack_nickname' => $nickname,
            'slack_id' => $request->slack_id,
            'slack_email' => $request->slack_email,
            'slack_avatar' => $request->slack_avatar,
            'slack_name' => $request->slack_name,
            'role' => $role,
            'membership' => 'alpha',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/jobs');
    }
}
