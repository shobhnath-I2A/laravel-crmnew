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
        Schema::create('package_day_item_hotels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('package_day_item_id')
                ->constrained('package_day_items')
                ->cascadeOnDelete();

            $table->foreignId('hotel_id')->nullable()
                ->constrained('hotels')
                ->nullOnDelete();

            $table->tinyInteger('hotel_type')->default(0)->comment('0 = Manual, 1 = From Master, 2 = API'); // 0 Manual, 1 From Master

            $table->string('hotel_category')->nullable();
            $table->string('room_name')->nullable();
            $table->string('room_type')->nullable();
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

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_day_item_hotels');
    }
};
