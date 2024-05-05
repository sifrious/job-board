<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'slack_nickname',
        'slack_id',
        'slack_email',
        'slack_avatar',
        'slack_name',
        'role',
        'membership',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

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
        $published = $collection->filter(function ($item) {
            return $item->is_active;
        });
        $drafts = $collection->filter(function ($item) {
            return !$item->is_active;
        });
        return [
            'all' => $collection,
            'published' => $published,
            'drafts' => $drafts,
        ];
    }

    public function get_listing_jobs(Collection $collection): Array
    {
        $jobs = [];
        $collection->each(function (Listing $listing) use (&$jobs) {
            $jobs[] = $listing->jobs()->get();
        });
        return $jobs;
    }

    public function created_listings(): Array
    {
        $listings = Listing::where('creator_id', $this->id)->get();
        $listings = $this->split_by_publication($listings);
        $this->listings_created = $listings['all'];
        $this->listings_created_published = $listings['published'];
        $this->listings_created_drafts = $listings['drafts'];
        return $listings;
    }

    public function owner_listings(): Array
    {
        $listings = Listing::where('owner_id', $this->id)->get();
        $listings = $this->split_by_publication($listings);
        $this->listings_owned = $listings['all'];
        $this->listings_owned_published = $listings['published'];
        $this->listings_owned_drafts = $listings['drafts'];
        return $listings;
    }

    public function listing_contact(): Array
    {
        $listings = Listing::where('preferred_contact', $this->id)->get();
        $listings = $this->split_by_publication($listings);
        $this->listings_contact = $listings['all'];
        $this->listings_contact_published = $listings['published'];
        $this->listings_contact_drafts = $listings['drafts'];
        return $listings;
    }

    public function get_all_listings(): Array
    {
        $created_listings = $this->created_listings();
        $owned_listings = $this->owner_listings();
        $contact_listings = $this->owner_listings();
        $merged_listings = $created_listings['all']
            ->merge($owned_listings['all'])
            ->merge($contact_listings['all'])
            ->unique('id');
        $all_user_listings = $this->split_by_publication($merged_listings);
        $active_listings = $this->split_active_listings($merged_listings);
        return [
            'created' => $created_listings,
            'owned' => $owned_listings,
            'contact' => $contact_listings,
            'active' => $active_listings,
            'all' => $all_user_listings,
        ];
    }

    public function jobs(): Array
    {
        $listings = $this->get_all_listings();
        $jobs = $this->get_listing_jobs($listings['all']['all']);
        $created_jobs = $this->split_by_publication($listings['created']['all']);
        $owned_jobs = $this->split_by_publication($listings['owned']['all']);
        $contact_jobs = $this->split_by_publication($listings['contact']['all']);
        return [
            'created' => $created_jobs,
            'owned' => $owned_jobs,
            'contact' => $contact_jobs,
            'all' => $jobs,
        ];
    }
}
