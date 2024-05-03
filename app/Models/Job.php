<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'organization',
        'contact',
        'contact_preferences',
        'contact_instructions',
        'url',
        'url_secondary',
        'url_tertiary',
        'url_linkedin',
        'url_label',
        'url_secondary_label',
        'url_tertiary_label',
        'url_linkedin_label',
        'description',
        'position_level',
        'location_type',
        'location_address',
        'commitment_type',
        'salary_range_min',
        'salary_range_max',
        'display_salary_range',
        'salary_measure',
        'benefits',
        'skills',
    ];
}
