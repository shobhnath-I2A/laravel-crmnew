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
        Schema::create('package_day_item_flights', function (Blueprint $table) {
            $table->id();
              $table->foreignId('package_day_item_id')
                ->constrained('package_day_items')
                ->cascadeOnDelete();

            $table->string('flight_no')->nullable();
            $table->string('from_destination')->nullable();
            $table->string('to_destination')->nullable();
            $table->string('flight_duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_day_item_flights');
    }
};
