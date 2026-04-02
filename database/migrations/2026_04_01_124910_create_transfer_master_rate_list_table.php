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
        Schema::create('transfer_master_rate_lists', function (Blueprint $table) {
            $table->id();
             // Relations
            $table->unsignedBigInteger('transfer_id'); // transfer_masters id
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();

            // Date Range
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // Pricing
            $table->integer('adult', 10)->default(0);
            $table->integer('child', 10)->default(0);
            $table->integer('infant', 10)->default(0);
            $table->decimal('vehicle_cost', 10, 2)->default(0);

            // Extra
            $table->string('transfer_type')->nullable(); // private/shared etc.
            $table->boolean('status')->default(1);

            // Meta
            $table->unsignedBigInteger('added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_master_rate_lists');
    }
};
