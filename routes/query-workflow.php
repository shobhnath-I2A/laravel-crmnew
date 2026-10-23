<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryWorkflowController as Workflow;

Route::get('payment/{token}', [Workflow::class, 'publicPayment'])
    ->middleware('throttle:30,1')
    ->name('query-payment.show');
Route::post('payment/{token}/verify', [Workflow::class, 'verifyPublicPayment'])
    ->middleware('throttle:10,1')
    ->name('query-payment.verify');

Route::middleware(['auth', 'verified', 'restrict.ip', 'crm.access'])->prefix('queries/{query_id}/workflow')->name('query-workflow.')->group(function () {
    Route::post('invoice', [Workflow::class, 'invoice'])->name('invoice');
    Route::get('invoice/print', [Workflow::class, 'printInvoice'])->name('invoice.print');
    Route::post('payments', [Workflow::class, 'payment'])->name('payment');
    Route::delete('payments/{payment_id}', [Workflow::class, 'voidPayment'])->name('payment.void');
    Route::post('payment-schedules', [Workflow::class, 'createPaymentSchedule'])->name('payment-schedule.create');
    Route::put('payment-schedules/{schedule_id}', [Workflow::class, 'updatePaymentSchedule'])->name('payment-schedule.update');
    Route::delete('payment-schedules/{schedule_id}', [Workflow::class, 'deletePaymentSchedule'])->name('payment-schedule.delete');
    Route::post('payment-schedules/{schedule_id}/link', [Workflow::class, 'sendPaymentLink'])->name('payment-schedule.link');
    Route::post('payment-schedules/{schedule_id}/details', [Workflow::class, 'sendPaymentDetails'])->name('payment-schedule.details');
    Route::post('payment-plan/email', [Workflow::class, 'sendPaymentPlan'])->name('payment-plan.email');
    Route::post('supplier-bookings', [Workflow::class, 'supplierBooking'])->name('supplier-booking');
    Route::post('supplier-payment', [Workflow::class, 'supplierPayment'])->name('supplier-payment');
    Route::post('vouchers', [Workflow::class, 'voucher'])->name('voucher');
    Route::get('vouchers/{voucher_id}', [Workflow::class, 'printVoucher'])->name('voucher.print');
    Route::post('documents', [Workflow::class, 'document'])->name('document');
    Route::get('documents/{document_id}', [Workflow::class, 'downloadDocument'])->name('document.download');
});
