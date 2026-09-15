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
        Schema::create('query_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('query_id');
            $table->text('details');
            $table->integer('added_by');
            $table->dateTime('date_added');

            $table->timestamps();

            $table->index('query_id');
            $table->index('added_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_notes');
    }
};
