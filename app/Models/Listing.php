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
        'user_represents_organization',
        'creator_id',
        'owner_id',
        'preferred_contact',
        'is_active',
        'is_published',
        'published_date',
        'removed_date'
    ];
}
