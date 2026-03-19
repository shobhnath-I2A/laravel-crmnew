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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            // Basic Info
            $table->string('name');
            $table->enum('category', [1,2,3,4,5])->nullable();
            $table->string('destination');
            // Details
            $table->text('details')->nullable();
            // Contact Info
            $table->string('contact_person')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_phone')->nullable();
            // Media
            $table->string('image')->nullable();
            // Extra
            $table->string('hotel_link')->nullable();
            // Status
            $table->boolean('status')->default(1); // 1=Active, 0=Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
