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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('crm_id')->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedTinyInteger('default_priority')->default(1); // fallback priority

            $table->timestamps();

            $table->index('crm_id');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
