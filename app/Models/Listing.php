<?php

namespace App\Models;

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

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
