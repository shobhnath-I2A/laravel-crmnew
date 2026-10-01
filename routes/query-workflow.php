<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryWorkflowController as Workflow;

Route::middleware(['auth', 'verified', 'restrict.ip', 'crm.access'])->prefix('queries/{query_id}/workflow')->name('query-workflow.')->group(function () {
    Route::post('invoice', [Workflow::class, 'invoice'])->name('invoice');
    Route::get('invoice/print', [Workflow::class, 'printInvoice'])->name('invoice.print');
    Route::post('payments', [Workflow::class, 'payment'])->name('payment');
    Route::post('supplier-bookings', [Workflow::class, 'supplierBooking'])->name('supplier-booking');
    Route::post('supplier-payment', [Workflow::class, 'supplierPayment'])->name('supplier-payment');
    Route::post('vouchers', [Workflow::class, 'voucher'])->name('voucher');
    Route::get('vouchers/{voucher_id}', [Workflow::class, 'printVoucher'])->name('voucher.print');
    Route::post('documents', [Workflow::class, 'document'])->name('document');
    Route::get('documents/{document_id}', [Workflow::class, 'downloadDocument'])->name('document.download');
});
