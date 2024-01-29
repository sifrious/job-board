<?php

namespace App\Http\Controllers;

use Exception;
use Inertia\Inertia;

class DashboardRoutingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $user_target = session('redirect_path') ?: null;
        session(['redirect_path' => null]);
        if (!is_null($user_target)) {
            return redirect($user_target);
        };
        dd("hit invokable container");
        return Inertia::render('Dashboard');
    }
}
