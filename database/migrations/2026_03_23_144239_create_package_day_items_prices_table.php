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
        Schema::create('package_day_items_prices', function (Blueprint $table) {
            $table->id();

            // Link to package_day_accommodation
            $table->foreignId('package_day_items_id')
                ->constrained('package_day_items')
                ->cascadeOnDelete();

            // Room type costs (default 0)
            $table->decimal('single_room_cost', 12, 2)->default(0);
            $table->decimal('double_room_cost', 12, 2)->default(0);
            $table->decimal('triple_room_cost', 12, 2)->default(0);
            $table->decimal('quad_room_cost', 12, 2)->default(0);
            $table->decimal('child_bed_cost', 12, 2)->default(0);
            $table->decimal('extra_adult_cost', 12, 2)->default(0);
            $table->decimal('adult_cost', 12, 2)->default(0);
            $table->decimal('child_cost', 12, 2)->default(0);

            // Totals and markup
            $table->decimal('total_price', 12, 2)->default(0);
            $table->decimal('markup', 12, 2)->default(0);
            $table->decimal('final_price', 12, 2)->default(0);

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_day_items_prices');
    }
};
