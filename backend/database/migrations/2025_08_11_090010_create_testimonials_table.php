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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            // The name of the person giving the testimonial, e.g., "Rorn Bunthong"
            $table->string('name');

            // The role or company of the person, e.g., "CEO of Poipet Insider"
            $table->string('role')->nullable();

            // The full text of the testimonial. Using `text` allows for longer content.
            $table->text('quote')->nullable();

            // The path or URL to the person's avatar image.
            $table->string('avatar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
