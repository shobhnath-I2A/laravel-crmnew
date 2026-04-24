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
        Schema::create('agent_rosters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id'); // OR user_id if using users table

            $table->date('roster_date');

            $table->time('shift_start');
            $table->time('shift_end');

            $table->unsignedTinyInteger('priority')->default(1); // 1,2,3
            $table->integer('max_assigned_leads')->default(10);

            $table->boolean('is_available')->default(true);

            $table->timestamps();

            $table->unique(['agent_id', 'roster_date']);

            $table->index(['roster_date', 'priority']);
            $table->index('agent_id');

            // Optional FK
            $table->foreign('agent_id')->references('id')->on('agents')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_rosters');
    }
};
