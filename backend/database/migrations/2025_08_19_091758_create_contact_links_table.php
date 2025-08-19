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
        Schema::create('contact_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('detail')->nullable();
            $table->string('href')->nullable();
            $table->string('icon_class')->comment('e.g., Envelope, TelegramLogo')->nullable();
            $table->string('hover_color')->comment('e.g., hover:bg-red-500')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_links');
    }
};
