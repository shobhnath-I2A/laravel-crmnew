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
        Schema::create('itineraries', function (Blueprint $table) {
            $table->id();
            // Basic Info
            $table->boolean('queryId')->default(0);
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');

            // Travellers
            $table->integer('adult')->default(1);
            $table->integer('child')->default(0);
            $table->text('destinations');

            // Notes
            $table->text('notes')->nullable();

            // Website Settings
            $table->integer('package_theme_id')->nullable();
            $table->boolean('show_website')->default(0);
            $table->decimal('website_cost', 10, 2)->nullable();
            $table->date('website_validity')->nullable();
            $table->boolean('show_in_popular')->default(0);
            $table->boolean('show_in_special')->default(0);

            $table->integer('total_days')->default(0);
            // About
            $table->longText('about_package')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraries');
    }
};
