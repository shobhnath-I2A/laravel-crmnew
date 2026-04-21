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
        Schema::create('weather_apis', function (Blueprint $table) {
            $table->id();
            $table->string('city_name')->nullable();
            $table->integer('cloud_pct')->nullable();
            $table->integer('temp_weather')->nullable();
            $table->integer('feels_like')->nullable();
            $table->integer('humidity')->nullable();
            $table->integer('min_temp')->nullable();
            $table->integer('max_temp')->nullable();
            $table->integer('wind_speed')->nullable();
            $table->integer('wind_degrees')->nullable();
            $table->bigInteger('sunrise')->nullable();
            $table->bigInteger('sunset')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_apis');
    }
};
