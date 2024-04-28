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
        return inertia('Jobs/Index', ['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session(['redirect_path' => '/jobs/new']);
        $user = Auth::user() ?: null;
        if (is_null($user)) {
            return Redirect('/home');
        }

        return inertia('Jobs/Create', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $magic_date = Carbon::create(1970, 1, 1, 0, 0, 1);
        $job = Job::create([
            'title' => $request->title,
            'organization' => $request->organization ?: null,
            'url' => $request->url ?: null,
            'description' => $request->description ?: null,
            'location_address' => $request->location_address ?: null,
            'skills' => $request->skills ?: null,
            'remaining_available' => 1,
        ]);
        dump($job);
        // Add organization based on job form
        if (!is_null($request->organization)) {
            $firm = Firm::firstOrCreate([
                ['name' => $request->organization]
            ]);
            dump($firm);
        } else {
            dump("did not create firm");
        };
        // Add skills from job form
        if (!is_null($request->skills)) {
            $skills = explode(",", $request->skills);
            foreach ($skills as $skill_str) {
                $skill_str = str_replace(" ", "", $skill_str);
                $skill = Skill::firstOrCreate([
                    ['name' => $skill],
                ]);
                $job_skill = JobSkill::firstOrCreate([
                    ['skill_id' => $skill->id],
                    ['skill_name' => $skill->name],
                    ['job_id' => $job->id]
                ]);
            };
        } else {
            dump("added no new skills");
        };
        // Add listing information
        $listing = Listing::create([
            'user_represents_organization' => true,
            'creator_id' => $user->id,
            'owner_id' => $user->id,
            'preferred_contact' => $user->id,
            'is_active' => $request->is_active ?: null,
            'is_published' => $request->is_published,
            'published_date' => $request->published_date ?: null,
            'removed_date' => $magic_date,
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
