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
        Schema::create('package_day_item_prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_day_item_id')
                ->constrained('package_day_items')
                ->cascadeOnDelete();

            $table->decimal('adult_cost', 12, 2)->default(0);
            $table->decimal('child_cost', 12, 2)->default(0);

            $table->integer('vehicle')->default(0);
            $table->decimal('vehicle_cost', 12, 2)->default(0);

            $table->decimal('single_room_cost', 12, 2)->default(0);
            $table->decimal('double_room_cost', 12, 2)->default(0);
            $table->decimal('triple_room_cost', 12, 2)->default(0);
            $table->decimal('quad_room_cost', 12, 2)->default(0);
            $table->decimal('child_bed_cost', 12, 2)->default(0);
            $table->decimal('extra_adult_cost', 12, 2)->default(0);

            $table->decimal('total_price', 12, 2)->default(0);
            $table->decimal('markup', 12, 2)->default(0);
            $table->decimal('markup_amount', 12, 2)->default(0);
            $table->decimal('final_price', 12, 2)->default(0);

            $table->json('pricing_data')->nullable();

            $table->timestamps();

            $table->unique('package_day_item_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_day_item_prices');
    }
};
