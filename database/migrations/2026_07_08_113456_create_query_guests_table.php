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
        Schema::create('query_guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('query_id');

            $table->string('title', 20)->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();

            $table->enum('gender', ['Male', 'Female', 'Other'])
                ->default('Male');

            $table->date('dob')->nullable();

            $table->timestamps();

            $table->foreign('query_id')
                ->references('id')
                ->on('queries')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_guests');
    }
};
