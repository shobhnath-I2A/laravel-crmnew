<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QueryVoucher extends Model
{
    protected $fillable = ['query_id','query_supplier_booking_id','snapshot','created_by'];
    protected $casts = ['snapshot' => 'array'];
    
}
