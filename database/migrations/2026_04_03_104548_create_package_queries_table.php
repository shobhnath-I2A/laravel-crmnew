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
        Schema::create('package_queries', function (Blueprint $table) {
            $table->id();
            $table->string('package_number')->nullable();

            $table->string('email')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->float('rating')->nullable();

            $table->string('from_city')->nullable();
            $table->string('to_city')->nullable();

            $table->string('phone_number', 15)->nullable();
            $table->string('phone_code', 10)->nullable();

            $table->integer('days')->nullable();

            $table->string('guid')->nullable();

            // Email type (3 = trekhops lead)
            $table->tinyInteger('email_type')->nullable()->comment('3 = trekhops.in lead');

            $table->string('full_name')->nullable();
            $table->text('url')->nullable();

            $table->boolean('is_authorized')->default(false);

            $table->integer('portal_id')->nullable();
            $table->string('source')->nullable();

            $table->ipAddress('client_ip')->nullable();

            $table->string('status')->nullable();
            $table->string('enquiry_type')->nullable();

            $table->timestamp('ent_date')->nullable();

            $table->string('company_name')->nullable();
            $table->text('description')->nullable();

            $table->string('campaign')->nullable();

            $table->integer('total_pax')->nullable();
            $table->string('travel_month')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_queries');
    }
};
