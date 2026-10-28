<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageComment extends Model
{
    protected $table = 'package_comments';

    protected $fillable = [
        'packageid',
        'comment',
    ];
}
