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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
             // Client Info
            $table->string('submit_name')->nullable(); // Mr, Mrs, etc
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('email2')->nullable();

            // Contact
            $table->string('mobile_code', 10)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('mobile_code2', 10)->nullable();
            $table->string('mobile2', 15)->nullable();

            // Address
            $table->unsignedBigInteger('city_id')->nullable(); // destination id
            $table->text('address')->nullable();

            // Personal
            $table->date('dob')->nullable();
            $table->date('marriage_anniversary')->nullable();
            $table->boolean('status')->default(1); // 1=Active, 0=Inactive
            $table->timestamps();

            // Foreign Key (optional)
            $table->foreign('city_id')->references('id')->on('destinations')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
