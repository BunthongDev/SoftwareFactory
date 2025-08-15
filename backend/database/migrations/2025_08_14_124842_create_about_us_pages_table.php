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
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->text('hero_description')->nullable();
            $table->string('hero_image1')->nullable();
            $table->string('hero_image2')->nullable();
            $table->string('stat1_number')->nullable();
            $table->string('stat1_label')->nullable();
            $table->string('stat2_number')->nullable();
            $table->string('stat2_label')->nullable();
            $table->string('journey_title')->nullable();
            $table->text('journey_description')->nullable();
            $table->string('team_title')->nullable();
            $table->text('team_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_pages');
    }
};
