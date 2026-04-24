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
        Schema::create('agent_destinations', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('agent_id');

            $table->string('destination_name'); // ex: delhi, goa

            $table->timestamps();

            $table->index('agent_id');
            $table->index('destination_name');

            // Optional FK
            $table->foreign('agent_id')->references('id')->on('agents')->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_destinations');
    }
};
