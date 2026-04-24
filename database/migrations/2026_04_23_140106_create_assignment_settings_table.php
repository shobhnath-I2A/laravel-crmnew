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
        Schema::create('assignment_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('min_gap_minutes')->default(15);
            $table->integer('default_max_leads_per_day')->default(10);

            $table->boolean('override_daily_limit')->default(true);
            $table->boolean('auto_assignment_enabled')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_settings');
    }
};
