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
        Schema::create('meal_plan_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name');//APAI,MAPAI,CPAI
            $table->foreignId('added_by')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('status')->default(1); // 1=Active, 0=Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_plan_masters');
    }
};
