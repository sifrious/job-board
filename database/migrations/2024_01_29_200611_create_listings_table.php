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
            $table->integer('owner_id')->references('id')->on('users');
            $table->integer('owner_role')->nullable();
            $table->integer('creator_id')->references('id')->on('users');
            $table->integer('preferred_contact')->reference('id')->on('users');
            $table->boolean('user_represents_organization')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_date')->nullable();
            $table->dateTime('removed_date')->nullable();
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
