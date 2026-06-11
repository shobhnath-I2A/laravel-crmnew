<?php

use Carbon\Carbon;

if (!function_exists('dbDate')) {

    function dbDate($date)
    {
        if (empty($date)) {
            return null;
        }

        try {
            return Carbon::createFromFormat('d-m-Y', $date)
                ->format('Y-m-d');
        } catch (\Exception $e) {
            return $date;
        }
    }
}

if (!function_exists('displayDate')) {

    function displayDate($date)
    {
        if (empty($date)) {
            return '';
        }

        try {
            return Carbon::parse($date)
                ->format('d-m-Y');
        } catch (\Exception $e) {
            return $date;
        }
    }
}

if (!function_exists('displayDateTime')) {

    function displayDateTime($date)
    {
        if (empty($date)) {
            return '';
        }

        try {
            return Carbon::parse($date)
                ->format('d-m-Y h:i A');
        } catch (\Exception $e) {
            return $date;
        }
    }
}

if (!function_exists('currencyFormat')) {

    function currencyFormat($amount)
    {
        return '₹ ' . number_format($amount ?? 0, 2);
    }
}
