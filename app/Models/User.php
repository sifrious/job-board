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

    private static function append_listing_jobs(Collection $collection) {
        // return $collection_with_jobs;
    }

    public function get_listings_array(): Array
    {
        return Listing::get_all($this);
    }
    
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function jobs_array(Array $listings): Array
    {
        if (is_null($listings)) {
            $listings = $this->get_listings_array();
        };
        return Job::get_all($this);
    }
}
