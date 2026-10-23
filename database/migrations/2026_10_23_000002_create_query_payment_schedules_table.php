<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('query_payment_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('query_id')->constrained('queries')->restrictOnDelete();
            $table->foreignId('query_invoice_id')->constrained('query_invoices')->restrictOnDelete();
            $table->unsignedBigInteger('amount_minor');
            $table->unsignedBigInteger('convenience_fee_minor')->default(0);
            $table->date('due_on');
            $table->string('status', 20)->default('pending');
            $table->string('razorpay_order_id', 100)->nullable()->unique();
            $table->char('public_token_hash', 64)->nullable()->unique();
            $table->text('public_token_encrypted')->nullable();
            $table->foreignId('query_payment_id')->nullable()->unique()->constrained('query_payments')->restrictOnDelete();
            $table->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $table->timestamps();
            $table->index(['query_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('query_payment_schedules');
    }
};
