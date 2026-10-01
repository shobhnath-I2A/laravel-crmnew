<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class QueryGuestDocument extends Model
{
    protected $fillable = ['query_id','query_guest_id','label','path','original_name','created_by'];
    protected $casts = [];
    
}
