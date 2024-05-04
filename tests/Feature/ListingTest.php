<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function can_store_listing_with_jobs(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('listing.store'), [
                'name' => 'Listing Name',
                'title' => 'Ship Mechanic',
                'organization' => 'Rebellion',
                'url' => 'https://rebellion.rebels',
                'description' => 'Fix broken ships',
                'location_address' => 'Elderon',
                'skills' => 'not dying,fixing ships',
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('listings', [
            'user_represents_organization' => true,
            'creator_id' => $user->id,
            'owner_id' => $user->id,
            'preferred_contact' => $user->id,
        ]);

        $this->assertDatabaseHas('jobs', [
            'name' => 'Listing Name',
            'title' => 'Ship Mechanic',
            'organization' => 'Rebellion',
            'description' => 'Fix broken ships',
            'location_address' => 'Elderon',
        ]);

        $this->assertDatabaseHas('firms', ['name' => 'Rebellion']);

        $this->assertDatabaseHas('skills', ['name' => 'not-dying']);
        $this->assertDatabaseHas('skills', ['name' => 'fixing-ships']);
    }
}
