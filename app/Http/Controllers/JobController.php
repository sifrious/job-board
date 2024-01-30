<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Listing;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Carbon\Carbon as Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user() ? Auth::user()->id : -1;
        return Inertia::render('Jobs/Index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session(['redirect_path' => '/jobs/new']);
        // $session_path = session('redirect_path');
        // $session_info = session()->all();
        // dump($session_info);
        // dump($session_path);
        // dd();
        $user = Auth::user() ?: null;
        if (is_null($user)) {
            return Redirect('/welcome');
        }

        return Inertia::render('Jobs/Create', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $magic_date = Carbon::create(1970, 1, 1, 0, 0, 1);
        $listing = Listing::create([
            'title' => $request->title,
            'user_represents_organization' => true,
            'creator_id' => $user->id,
            'owner_id' => $user->id,
            'organization' => $request->organization ?: null,
            'url' => $request->url ?: null,
            'description' => $request->description ?: null,
            'location_address' => $request->location_address ?: null,
            'skills' => $request->skills ?: null,
            'is_active' => $request->is_active ?: null,
            'is_published' => $request->is_published,
            'published_date' => $request->published_date ?: null,
            'removed_date' => $magic_date,
            'preferred_contact' => $user->id,
        ]);
        session('flash_listing', $listing);
        return redirect('/user/jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
