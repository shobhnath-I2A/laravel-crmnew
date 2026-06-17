<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackageTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'status',
        'created_by'
    ];

    public function addedBy(){
        return $this->belongsTo(user::class, 'created_by');
    }
}
