<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPlanMaster extends Model
{
    protected $table = 'meal_plan_masters';

    protected $fillable = [
        'name',
        'status',
        'added_by',
    ];
}
