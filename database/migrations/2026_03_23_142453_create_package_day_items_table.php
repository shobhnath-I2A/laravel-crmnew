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
        $table->foreignId('destination_id')->nullable()->constrained('destinations')->nullOnDelete();

        $table->integer('day')->default(1);
        $table->integer('day_order')->default(0);

        $table->string('type', 50)
            ->comment('daydetail, accommodation, activity, flight, transportation, cruise, meal, insurance, visa');

        $table->tinyInteger('source_type')->default(0)
            ->comment('0 manual, 1 from master');

        $table->string('name')->nullable();
        $table->text('description')->nullable();

        $table->boolean('show_time')->default(0);
        $table->date('item_date')->nullable();
        $table->time('start_time')->nullable();
        $table->time('end_time')->nullable();

        $table->tinyInteger('status')->default(1);
        $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

        $table->timestamps();
        $table->softDeletes();

        $table->index(['package_id', 'day', 'type']);
        $table->index(['type', 'status']);
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
