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
        Schema::create('query_logs', function (Blueprint $table) {
            $table->id();
            $table->text('details')->nullable();
            $table->integer('query_id');
            $table->integer('added_by');
            $table->dateTime('date_added');
            $table->text('status_comment')->nullable();
            $table->string('log_type', 50)->nullable();

            $table->timestamps();

            $table->index('query_id');
            $table->index('added_by');
            $table->index('log_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_logs');
    }
};
