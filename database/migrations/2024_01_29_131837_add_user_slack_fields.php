<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function ($table) {
            $table->string('slack_id')->nullable();
            $table->string('slack_nickname')->nullable();
            $table->string('slack_email')->nullable();
            $table->string('slack_avatar')->nullable();
            $table->string('slack_name')->nullable();
            $table->string('membership')->nullable();
            $table->string('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('slack_id');
            $table->dropColumn('slack_nickname');
            $table->dropColumn('slack_email');
            $table->dropColumn('slack_avatar');
            $table->dropColumn('slack_name');
            $table->dropColumn('membership');
            $table->dropColumn('role');
        });
    }
};
