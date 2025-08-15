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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            // Section 1: Brand Identity
            $table->string('logo')->nullable();
            $table->text('slogan')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();

            // Section 3: Telegram CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_link')->nullable();

            // Section 4: Copyright
            $table->string('copyright_text')->nullable();

            // Customization Fields
            $table->string('background_color')->default('#0f1e33');
            $table->string('font_color')->default('#ffffff');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
