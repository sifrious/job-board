<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_represents_organization',
        'organization',
        'url',
        'description',
        'location_address',
        'skills',
        'is_active',
        'is_published',
        'creator_id',
        'owner_id',
        'preferred_contact',
        'published_date',
        'removed_date'
    ];
}
