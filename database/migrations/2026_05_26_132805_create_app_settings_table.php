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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('country_code', 20)->default('91');
            $table->string('group_name', 100);
            $table->string('key_name', 150);
            $table->longText('value')->nullable();

            $table->timestamps();

            $table->unique(['country_code', 'group_name', 'key_name'], 'app_settings_unique_key');
            $table->index(['country_code', 'group_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_settings');
    }
};
