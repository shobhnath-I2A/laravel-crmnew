<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherSetting extends Model
{
    protected $table = 'weather_apis';

    protected $fillable = [
        'city_name',
        'cloud_pct',
        'temp_weather',
        'feels_like',
        'humidity',
        'min_temp',
        'max_temp',
        'wind_speed',
        'wind_degrees',
        'sunrise',
        'sunset',
    ];
}
