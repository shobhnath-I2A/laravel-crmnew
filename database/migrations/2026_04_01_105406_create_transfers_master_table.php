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
        Schema::create('transfer_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('destination')->nullable(); // FK if using destinations table
            // Details
            $table->text('details')->nullable();
            // Media
            $table->string('image')->nullable();
            // Status
            $table->boolean('status')->default(1); // 1 = Active, 0 = Inactive
            $table->timestamps();
            // Optional Foreign Key (if destinations table exists)
            // $table->foreign('destination')->references('id')->on('destinations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_masters');
    }
};
