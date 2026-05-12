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
        Schema::create('package_inclusions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            // Inclusions
            $table->string('inclusions_title')->nullable();
            $table->longText('package_inclusions')->nullable();
            $table->string('inclusions_img')->nullable();

            // Important Tips
            $table->string('important_tips_title')->nullable();
            $table->longText('package_important_tips')->nullable();
            $table->string('important_tips_img')->nullable();

            // Exclusions
            $table->string('exclusions_title')->nullable();
            $table->longText('package_exclusions')->nullable();
            $table->string('exclusions_img')->nullable();

            // Travel Information
            $table->string('travel_information_title')->nullable();
            $table->longText('package_travel_info')->nullable();
            $table->string('travel_info_img')->nullable();

            $table->timestamps();

            // Optional foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_inclusions');
    }
};
