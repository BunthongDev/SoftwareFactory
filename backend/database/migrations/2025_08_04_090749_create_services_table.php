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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // The heading of the service, which can be used as a title or main heading.
            $table->string('heading');

            // The title of the service (e.g., "Game Development").
            $table->string('title');

            // A longer description of the service.
            $table->text('description')->nullable();

            // To store the icon. You can store an SVG, an image path, or a font icon class (e.g., 'icon-game-development').
            $table->string('icon')->nullable();

            // To control the display order of the services on the frontend.
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
