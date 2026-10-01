<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('query_invoices', function (Blueprint $t) {
            $t->id();
            $t->foreignId('query_id')->unique()->constrained('queries')->restrictOnDelete();
            $t->foreignId('itinerary_id')->constrained('itineraries')->restrictOnDelete();
            $t->string('currency', 3);
            $t->unsignedBigInteger('amount_minor');
            $t->text('description');
            $t->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $t->timestamps();
        });
        Schema::create('query_payments', function (Blueprint $t) {
            $t->id();
            $t->foreignId('query_id')->constrained('queries')->restrictOnDelete();
            $t->foreignId('query_invoice_id')->constrained('query_invoices')->restrictOnDelete();
            $t->uuid('request_key')->unique();
            $t->unsignedBigInteger('amount_minor');
            $t->string('reference', 150);
            $t->string('method', 30);
            $t->date('paid_on');
            $t->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $t->timestamps();
        });
        Schema::create('query_supplier_bookings', function (Blueprint $t) {
            $t->id();
            $t->foreignId('query_id')->constrained('queries')->restrictOnDelete();
            $t->foreignId('package_day_item_id')->unique()->constrained('package_day_items')->restrictOnDelete();
            $t->foreignId('supplier_id')->constrained('suppliers')->restrictOnDelete();
            $t->string('reference', 150)->nullable();
            $t->string('status', 20)->default('pending');
            $t->string('currency', 3);
            $t->unsignedBigInteger('amount_minor');
            $t->unsignedBigInteger('paid_minor')->default(0);
            $t->text('remarks')->nullable();
            $t->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $t->timestamps();
        });
        Schema::create('query_vouchers', function (Blueprint $t) {
            $t->id();
            $t->foreignId('query_id')->constrained('queries')->restrictOnDelete();
            $t->foreignId('query_supplier_booking_id')->unique()->constrained('query_supplier_bookings')->restrictOnDelete();
            $t->json('snapshot');
            $t->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $t->timestamps();
        });
        Schema::create('query_guest_documents', function (Blueprint $t) {
            $t->id();
            $t->foreignId('query_id')->constrained('queries')->restrictOnDelete();
            $t->foreignId('query_guest_id')->constrained('query_guests')->restrictOnDelete();
            $t->string('label', 100);
            $t->string('path');
            $t->string('original_name');
            $t->foreignId('created_by')->constrained('users')->restrictOnDelete();
            $t->timestamps();
        });
    }
    public function down(): void
    {
        foreach (['query_guest_documents', 'query_vouchers', 'query_supplier_bookings', 'query_payments', 'query_invoices'] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
