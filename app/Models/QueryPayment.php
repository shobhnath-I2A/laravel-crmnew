<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QueryPayment extends Model
{
    protected $fillable = ['query_id','query_invoice_id','request_key','amount_minor','reference','method','paid_on','created_by'];
    protected $casts = ['paid_on' => 'date'];
    
}
