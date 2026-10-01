<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QuerySupplierBooking extends Model
{
    protected $fillable = ['query_id','package_day_item_id','supplier_id','reference','status','currency','amount_minor','paid_minor','remarks','created_by'];
    protected $casts = [];
    public function supplier() { return $this->belongsTo(Supplier::class); }
    public function item() { return $this->belongsTo(PackageDayItem::class, 'package_day_item_id'); }
}
