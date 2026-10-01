<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QueryInvoice extends Model
{
    protected $fillable = ['query_id','itinerary_id','currency','amount_minor','description','created_by'];
    protected $casts = [];
    public function payments() { return $this->hasMany(QueryPayment::class); }
}
