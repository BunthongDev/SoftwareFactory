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
        // This table stores the individual menu links.
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            // The text displayed for the link (e.g., "About Us")
            $table->string('label');

            // The URL the link points to (e.g., "/about")
            $table->string('link');

            // An integer to store the display order for drag-and-drop functionality.
            $table->integer('order')->default(0);

            // A boolean to allow the admin to enable/disable a menu item.
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
