<?php

// database/migrations/...._create_logos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logos', function (Blueprint $table) {
            $table->id();

            // Core Company Information
            $table->string('name')->default('Your Company Name');
            $table->text('slogan')->nullable();

            // Contact Information
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->longText('map_embed_url')->nullable()->comment('Google Maps IFrame URL');

            // Images
            $table->string('logo_image')->nullable();
            $table->string('favicon')->nullable();

            // Company Statements
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();

            // Website & SEO
            $table->json('social_links')->nullable()->comment('Stores URLs for social media');
            $table->string('copyright_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logos');
    }
};