<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardRoutingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $listings = $user->get_listings_array();
        return inertia('Dashboard', [
            'user' => $user,
            'listings'=> $listings,
            'jobs' => $user->jobs_array($listings),
        ]);
    }
}
