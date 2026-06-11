<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateFormatter
{
    protected function convertDate($value)
    {
        if (empty($value)) {
            return null;
        }

        try {
            return Carbon::createFromFormat('d-m-Y', $value)
                ->format('Y-m-d');
        } catch (\Exception $e) {
            return $value;
        }
    }

    protected function formatDateForDisplay($value)
    {
        if (empty($value)) {
            return null;
        }

        try {
            return Carbon::parse($value)
                ->format('d-m-Y');
        } catch (\Exception $e) {
            return $value;
        }
    }
}
