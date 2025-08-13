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
        Schema::create('blogs', function (Blueprint $table) {
            // The unique ID for each blog post
            $table->id();

            // The title of the blog post, e.g., "Investment Opportunities Explore Options"
            $table->string('title');

            // A URL-friendly version of the title for clean URLs, e.g., "investment-opportunities-explore-options"
            $table->string('slug')->unique();

            // The category of the post, e.g., "financial planning"
            $table->string('category');

            // Tags for the post, which can be stored as a comma-separated string, e.g., "featured, skill"
            $table->string('tags')->nullable();

            // The main feature image for the post
            $table->string('image');

            // The short description or excerpt for the post
            $table->text('excerpt')->nullable();

            // The full content of the blog post, using longText to allow for very long articles
            $table->longText('content')->nullable();

            // The name of the author
            $table->string('author_name')->default('Admin');

            // The path to the author's avatar image
            $table->string('author_avatar')->nullable();

            // A timestamp to control when the post is published. Can be set in the future.
            $table->timestamp('published_at')->nullable();

            // Standard Laravel timestamps for `created_at` and `updated_at`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
