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
        Schema::create('hotel_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('room_type')->nullable();
            $table->string('meal_plan')->nullable();
            // Pricing
            $table->decimal('single', 10, 2)->nullable();
            $table->decimal('double', 10, 2)->nullable();
            $table->decimal('triple', 10, 2)->nullable();
            $table->decimal('quad', 10, 2)->nullable();
            $table->decimal('child_bed', 10, 2)->nullable();
            $table->decimal('extra_adult', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rates');
    }
};
