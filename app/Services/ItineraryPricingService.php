<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ItineraryPricingService
{
    public function calculateHotelOptionTotals(
        Collection $dayItems,
        float $cgst,
        float $sgst,
        float $igst,
        float $tcs,
        float $extraMarkup,
        float $discount
    ): array {
        $withoutHotelGross = $dayItems
            ->where('type', '!=', 'accommodation')
            ->sum(fn ($item) => (float) ($item->price->final_price ?? 0));

        $hotelAmounts = [];

        foreach ($dayItems->where('type', 'accommodation') as $item) {
            $option = $item->hotels->first()?->pivot?->hotel_options
                ?? $item->hotelDetail?->hotel_options
                ?? 1;

            $hotelAmounts[$option] = ($hotelAmounts[$option] ?? 0)
                + (float) ($item->price->final_price ?? 0);
        }

        $optionTotals = [];

        foreach ($hotelAmounts as $option => $hotelAmount) {
            $optionGross = $withoutHotelGross + $hotelAmount;
            $optionTotals[$option] = $optionGross
                + $extraMarkup
                + ($optionGross * $cgst / 100)
                + ($optionGross * $sgst / 100)
                + ($optionGross * $igst / 100)
                + ($optionGross * $tcs / 100)
                - $discount;
        }

        return [
            'withoutHotelGross' => $withoutHotelGross,
            'hotelOptionTotals' => $hotelAmounts,
            'optionTotals' => $optionTotals,
        ];
    }
}
