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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            // Basic Info
            $table->string('full_name');
            $table->string('portal_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 20);
            $table->string('phone_code', 10)->nullable();
            // Travel Details
            $table->string('from_city')->nullable();
            $table->string('to_city')->nullable();
            $table->date('travel_date')->nullable();
            $table->string('travel_month')->nullable();
            $table->integer('total_pax')->default(1);
            $table->integer('days')->nullable();
            // Budget / Preferences
            $table->integer('budget')->nullable();
            $table->text('description')->nullable();
            // Lead Source Tracking
            $table->string('source')->nullable(); // Facebook, Google, Website
            $table->string('campaign')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();

            // System Tracking
            $table->ipAddress('client_ip')->nullable();
            $table->string('reference_url')->nullable();
            // CRM Fields
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->enum('status', [
                'new',
                'contacted',
                'qualified',
                'proposal_sent',
                'converted',
                'lost'
            ])->default('new');

            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');

            // Extra Business Fields
            $table->string('company_name')->nullable();
            $table->boolean('is_authorized')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
