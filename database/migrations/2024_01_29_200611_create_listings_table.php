<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('organization')->nullable();
            $table->integer('owner_id')->references('id')->on('users');
            $table->integer('creator_id')->references('id')->on('users');
            $table->integer('preferred_contact')->reference('id')->on('users');
            $table->string('contact')->nullable();
            $table->string('contact_preferences')->nullable();
            $table->string('contact_instructions')->nullable();
            $table->boolean('user_represents_organization');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_date');
            $table->dateTime('removed_date');
            $table->string('url')->nullable();
            $table->string('url_secondary')->nullable();
            $table->string('url_tertiary')->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('description')->nullable();
            $table->string('position_level')->nullable();
            $table->string('location_type')->nullable();
            $table->string('location_address')->nullable();
            $table->string('commitment_type')->nullable();
            $table->string('position_type')->nullable();
            $table->float('salary_range_min', 12, 2)->nullable();
            $table->float('salary_range_max', 12, 2)->nullable();
            $table->boolean('display_salary_range')->nullable();
            $table->string('salary_measure')->nullable();
            $table->string('benefits')->nullable();
            $table->string('skills')->nullable();
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
