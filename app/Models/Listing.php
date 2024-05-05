<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'creator_id',
        'owner_id',
        'user_represents_organization',
        'preferred_contact',
        'is_active',
        'is_published',
    ];

    private static function zip_relations(Collection $collection): Collection
    {
        return $collection["all"]["all"]->map(function ($listing) {
            $listing_relations = $listing->getRelations()['jobs']->toArray();
            $listing->jobs = $listing_relations;
        });
    }

    private static function split_by_publication(Collection $collection)
    {
        $published = $collection->filter(function ($item) {
            return $item->is_published;
        });
        $drafts = $collection->filter(function ($item) {
            return !$item->is_published;
        });
        return [
            'all' => $collection,
            'published' => $published,
            'drafts' => $drafts,
        ];
    }

    private static function split_active_listings(Collection $collection) {
        $active_listings = $collection->filter(function ($item) {
            return $item->is_active;
        });
        $inactive_listings = $collection->filter(function ($item) {
            return !$item->is_active;
        });
        return [
            'active' => $active_listings,
            'inactive' => $inactive_listings
        ];
    }

    private static function get_listing_jobs(Collection $collection): Array
    {
        $jobs = [];
        $collection->each(function (Listing $listing) use (&$jobs) {
            $jobs[] = $listing->jobs()->get();
        });
        return $jobs;
    }

    private static function get_created_array(User $user): Array
    {
        $listings = Listing::where('creator_id', $user->id)
            ->with('jobs')
            ->get();
        $listings = Listing::split_by_publication($listings);
        $user->listings_created = $listings['all'];
        $user->listings_created_published = $listings['published'];
        $user->listings_created_drafts = $listings['drafts'];
        return $listings;
    }

    private static function get_owned_array(User $user): Array
    {
        $listings = Listing::where('owner_id', $user->id)
            ->with('jobs')
            ->get();
        $listings = Listing::split_by_publication($listings);
        $user->listings_owned = $listings['all'];
        $user->listings_owned_published = $listings['published'];
        $user->listings_owned_drafts = $listings['drafts'];
        return $listings;
    }

    private static function get_contact_array(User $user): Array
    {
        $listings = Listing::where('preferred_contact', $user->id)
            ->with('jobs')
            ->get();
        $listings = Listing::split_by_publication($listings);
        $user->listings_contact = $listings['all'];
        $user->listings_contact_published = $listings['published'];
        $user->listings_contact_drafts = $listings['drafts'];
        return $listings;
    }

    public static function get_all(User $user): Array
    {
        $created_listings = Listing::get_created_array($user);
        $owned_listings = Listing::get_owned_array($user);
        $contact_listings = Listing::get_contact_array($user);
        $merged_listings = $created_listings['all']
            ->merge($owned_listings['all'])
            ->merge($contact_listings['all'])
            ->unique('id');
        $all_user_listings = Listing::split_by_publication($merged_listings);
        $active_listings = Listing::split_active_listings($merged_listings);
        return [
            'created' => $created_listings,
            'owned' => $owned_listings,
            'contact' => $contact_listings,
            'active' => $active_listings['active'],
            'inactive' => $active_listings['inactive'],
            'all' => $all_user_listings,
        ];
    }

    public static function get_all_jobs(User $user, Array $listings): Array
    {
        $listings = Listing::get_all($user);
        $jobs = Listing::get_listing_jobs($listings['all']['all']);
        $created_jobs = Listing::split_by_publication($listings['created']['all']);
        $owned_jobs = Listing::split_by_publication($listings['owned']['all']);
        $contact_jobs = Listing::split_by_publication($listings['contact']['all']);
        return [
            'created' => $created_jobs,
            'owned' => $owned_jobs,
            'contact' => $contact_jobs,
            'all' => $jobs,
        ];
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
