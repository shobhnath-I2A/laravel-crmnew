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
            $table->decimal('single', 12, 2)->nullable();
            $table->decimal('double', 12, 2)->nullable();
            $table->decimal('triple', 12, 2)->nullable();
            $table->decimal('quad', 12, 2)->nullable();
            $table->decimal('child_bed', 12, 2)->nullable();
            $table->decimal('extra_adult', 12, 2)->nullable();
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
