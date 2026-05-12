<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageInclusion extends Model
{
     protected $table = 'package_inclusions';

    protected $fillable = [
        'user_id',

        'inclusions_title',
        'package_inclusions',
        'inclusions_img',

        'important_tips_title',
        'package_important_tips',
        'important_tips_img',

        'exclusions_title',
        'package_exclusions',
        'exclusions_img',

        'travel_information_title',
        'package_travel_info',
        'travel_info_img',
    ];
}
