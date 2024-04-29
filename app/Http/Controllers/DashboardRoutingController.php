<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardRoutingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user_target = session('redirect_path') ?: null;
        if (!is_null($user_target)) {
            return redirect($user_target);
        };
        return inertia('Dashboard', ['user' => $request->user()]);
    }
}
