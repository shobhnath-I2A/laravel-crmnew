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
        Schema::create('automations', function (Blueprint $table) {
            $table->id();$table->unsignedBigInteger('query_status');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('destination_id');

            $table->longText('details')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->boolean('status')->default(1);

            $table->unsignedBigInteger('added_by')->nullable();

            $table->timestamps();

            $table->index(['query_status', 'package_id', 'destination_id']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automations');
    }
};
