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
        // This table will store the overall menu settings and will only ever have one row.
                Schema::create('menu_settings', function (Blueprint $table) {
                    $table->id();

                    // Path to the uploaded logo file.
                    $table->string('logo_path')->nullable();

                    // The "Free Consultancy" text.
                    $table->string('consultancy_text')->nullable()->default('Free Consultancy');

                    // The phone number text.
                    $table->string('phone_number')->nullable();

                    // The background color for the menu bar (e.g., #FFFFFF).
                    $table->string('background_color')->nullable()->default('#FFFFFF');

                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_settings');
    }
};
