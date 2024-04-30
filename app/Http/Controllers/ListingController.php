<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Firm;
use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Listing;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        session(['redirect_path' => '/jobs/new']);
        $user = Auth::user() ?: null;
        if (is_null($user)) {
            return Redirect('/home');
        }

        return inertia('Listings/Create', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        //
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
        // Add organization based on job form
        if (!is_null($request->organization)) {
            $firm = Firm::firstOrNew([
                ['name' => $request->organization],
            ]);
            $firm->save();
        };
        // Add skills from job form
        if (!is_null($request->skills)) {
            $skills = explode(",", $request->skills);
            foreach ($skills as $skill_str) {
                $skill_str = str_replace(" ", "", $skill_str);
                $skill = Skill::firstOrNew([
                    ['name' => $skill_str],
                ]);
                $skill->save();
                $job_skill = JobSkill::firstOrNew([
                    ['skill_id' => $skill->id],
                    ['skill_name' => $skill->name],
                    ['job_id' => $job->id]
                ]);
                $job_skill->save();
            };
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
        if ($listing) {
            return redirect('listing.show', [$listing->id]);
        };
        return redirect('userListing.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
