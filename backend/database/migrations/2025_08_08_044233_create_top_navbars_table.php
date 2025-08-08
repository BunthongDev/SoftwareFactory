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
        Schema::create('top_navbars', function (Blueprint $table) {
            $table->id();

            // Columns for Contact Information
            $table->string('address')->nullable();
            $table->string('email')->nullable();

            // Columns for Social Media Links & Statuses
            // We make the URL nullable in case the admin leaves it blank.
            // The status is a boolean (true/false) to control visibility, defaulting to false (off).

            // Facebook
            $table->string('facebook_url')->nullable();
            $table->boolean('facebook_status')->default(false);

            // LinkedIn
            $table->string('linkedin_url')->nullable();
            $table->boolean('linkedin_status')->default(false);

            // X (Twitter)
            $table->string('twitter_url')->nullable();
            $table->boolean('twitter_status')->default(false);

            // Instagram
            $table->string('instagram_url')->nullable();
            $table->boolean('instagram_status')->default(false);

            // YouTube
            $table->string('youtube_url')->nullable();
            $table->boolean('youtube_status')->default(false);

            // Telegram
            $table->string('telegram_url')->nullable();
            $table->boolean('telegram_status')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_navbars');
    }
};
