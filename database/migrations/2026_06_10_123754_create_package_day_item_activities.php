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
        Schema::create('package_day_item_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_day_item_id')
                ->constrained('package_day_items')
                ->cascadeOnDelete();

            $table->string('day_subject')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_day_item_activities');
    }
};
