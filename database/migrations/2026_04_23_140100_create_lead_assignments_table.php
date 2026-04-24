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
        Schema::create('lead_assignments', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('agent_id');

            $table->unsignedTinyInteger('priority_used')->nullable();

            $table->string('assignment_type', 30)->default('auto');
            // auto, manual, auto_override

            $table->timestamp('assigned_at');

            $table->timestamps();

            $table->index(['agent_id', 'assigned_at']);
            $table->index('lead_id');

            // Optional FK
            $table->foreign('lead_id')->references('id')->on('leads')->cascadeOnDelete();
            $table->foreign('agent_id')->references('id')->on('agents')->cascadeOnDelete();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_assignments');
    }
};
