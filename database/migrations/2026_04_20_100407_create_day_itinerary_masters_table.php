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
        Schema::create('day_itinerary_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('destination')->nullable();
            $table->text('details')->nullable();
            $table->boolean('status')->default(1); // 1=Active, 0=Inactive
            $table->foreignId('added_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('day_itinerary_masters');
    }
};
