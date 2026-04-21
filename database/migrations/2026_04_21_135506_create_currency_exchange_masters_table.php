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
        Schema::create('currency_exchange_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->decimal('rate', 10, 2)->default(1.00);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('added_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_exchange_masters');
    }
};
