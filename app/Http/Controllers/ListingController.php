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
use Illuminate\Support\Str;

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
        $form_content = $request->all();

        $listing = Listing::create([
            'user_represents_organization' => true,
            'creator_id' => $user->id,
            'owner_id' => $user->id,
            'preferred_contact' => $user->id,
        ]);

        $job = $listing->jobs()->create([
            'name' => $form_content['name'],
            'title' => $form_content['title'],
            'organization' => $form_content['organization'] ?: null,
            'url' => $form_content['url'] ?: null,
            'description' => $form_content['description'] ?: null,
            'location_address' => $form_content['location_address'] ?: null,
            'remaining_available' => 1,
        ]);

        // Add organization based on job form
        if (!is_null($form_content['organization']) && ! Firm::where('name', $form_content['organization'])->exists()) {
            Firm::create([
                'name' => $form_content['organization'],
            ]);
        }

        // Add skills from job form
        if (!is_null($form_content['skills'])) {
            $skills = explode(",", $form_content['skills']);

            foreach ($skills as $skill_str) {
                $skill_str = Str::slug($skill_str);
                $skill = Skill::firstOrCreate(['name' => $skill_str]);

                $job->skills()->attach($skill);
            };
        };

        return to_route('userjobs.index');
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
