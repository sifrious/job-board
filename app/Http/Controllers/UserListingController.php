<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flash = null;
        $user = Auth::user();
        $listings = DB::table('listings')
            ->where('creator_id', $user->id)
            ->orWhere('owner_id', $user->id)
            ->get();
        if (!is_null(session('flash_listing'))) {
            $flash = session('flash_listing');
            session('flash_listing', null);
        };
        return Inertia::render('Listings/UserListings', [
            'user' => $user,
            'listings' => $listings,
            'flash' => $flash,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
