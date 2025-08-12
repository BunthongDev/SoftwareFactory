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
        Schema::create('clients', function (Blueprint $table) {
            // The unique ID for each client
            $table->id();

            // The name of the client company, e.g., "Innovate Inc."
            $table->string('name')->nullable();

            // The path or URL to the client's logo image.
            $table->string('logo');

            // The full URL to the client's website. `nullable` makes this field optional.
            $table->string('website_url')->nullable();

            // Standard Laravel timestamps for `created_at` and `updated_at`.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
