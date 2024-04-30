<?php

namespace App\Http\Controllers;

use App\Models\Firm;
use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Listing;
use App\Models\Skill;
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
        $jobs = Job::latest()
                    ->limit(20)
                    ->get();
        $user = Auth::user();
        $user_jobs = null;
        if ($user) {
            $user_jobs = Job::where('user_id', $user->id)
                                ->latest()
                                ->limit(20)
                                ->get();
        };
        return inertia('Jobs/Index', ['user' => $user, 'jobs' => $jobs, 'user_jobs' => $user_jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
