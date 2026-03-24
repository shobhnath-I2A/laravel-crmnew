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
    Schema::create('package_day_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();
        $table->foreignId('hotel_id')->nullable()->constrained('hotels')->nullOnDelete();
        $table->foreignId('destination_id')->nullable()->constrained('destinations')->nullOnDelete();
        $table->string('type');// like hotel, accomodation,activity...
        // Snapshot of hotel data at time of booking
        $table->integer('day')->default(0);
        $table->string('show_day_order')->default(0);
        $table->string('hotel_name');
        $table->string('room_type')->nullable();
        $table->string('category')->nullable();
        $table->string('room_name')->nullable();
        $table->string('meal_plan')->nullable();
        $table->string('hotel_options')->nullable();

        $table->integer('single_room')->default(0);
        $table->integer('double_room')->default(0);
        $table->integer('triple_room')->default(0);
        $table->integer('quad_room')->default(0);
        $table->integer('cwb_room')->default(0);
        $table->integer('cnb_room')->default(0);

        $table->date('check_in_date')->nullable();
        $table->time('check_in_time')->nullable();
        $table->date('check_out_date')->nullable();
        $table->time('check_out_time')->nullable();

        $table->text('description')->nullable();

        $table->timestamps();
        $table->softDeletes(); // optional, for safety
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_day_items');
    }
};
