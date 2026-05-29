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
        Schema::create('country_master', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('modify_by')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();

            $table->unsignedBigInteger('date_added')->nullable();
            $table->unsignedBigInteger('modify_date')->nullable();

            $table->boolean('delete_status')->default(false);

            $table->string('name', 80);
            $table->string('sortname', 10);
            $table->string('country_code', 10);

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->index('name');
            $table->index('sortname');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_master');
    }
};
