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
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('mobile');
            $table->string('email');
            $table->string('submitName')->nullable();
            $table->string('name');
            $table->string('querytype');
            $table->string('travelMonth')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('adult');
            $table->integer('child')->nullable();
            $table->integer('infant')->nullable();
            $table->string('leadSource')->nullable();
            $table->integer('priorityStatus')->nullable();
            $table->string('assignTo')->nullable();
            $table->string('serviceId')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('statusId')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};
