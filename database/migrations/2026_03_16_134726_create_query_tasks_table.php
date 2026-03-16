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
        Schema::create('query_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('queryId');
            $table->text('details')->nullable();
            $table->dateTime('reminderDate')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('addedBy')->nullable();
            $table->string('taskType')->nullable();
            $table->unsignedBigInteger('assignTo')->nullable();
            $table->boolean('makeDone')->default(false);
            $table->dateTime('confirmDate')->nullable();
            $table->integer('notificationType')->default(0);
            $table->timestamps();
            $table->foreign('queryId')->references('id')->on('queries')->onDelete('cascade');
            //  $table->foreign('addedBy')->references('id')->on('users')->onDelete('set null');
            //  $table->foreign('assignTo')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('query_tasks');
    }
};
