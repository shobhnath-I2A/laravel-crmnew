<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryPaymentSchedule extends Model
{
    protected $fillable = [
        'query_id',
        'query_invoice_id',
        'amount_minor',
        'convenience_fee_minor',
        'due_on',
        'status',
        'razorpay_order_id',
        'public_token_hash',
        'public_token_encrypted',
        'query_payment_id',
        'created_by',
    ];

    protected $casts = [
        'due_on' => 'date',
    ];

    public function invoice()
    {
        return $this->belongsTo(QueryInvoice::class, 'query_invoice_id');
    }

    public function payment()
    {
        return $this->belongsTo(QueryPayment::class, 'query_payment_id');
    }

    public function queryRecord()
    {
        return $this->belongsTo(Query::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
