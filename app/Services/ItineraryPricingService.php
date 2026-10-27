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
            ->filter(fn ($item) => strtolower((string) $item->type) !== 'accommodation')
            ->sum(fn ($item) => (float) ($item->price->final_price ?? 0));

        $hotelAmounts = [];

        foreach ($dayItems->filter(fn ($item) => strtolower((string) $item->type) === 'accommodation') as $item) {
            $options = collect($item->hotels ?? [])
                ->map(fn ($hotel) => $hotel->pivot?->hotel_options)
                ->push($item->hotelDetail?->hotel_options)
                ->filter(fn ($option) => $option !== null && trim((string) $option) !== '')
                ->map(fn ($option) => (string) $option)
                ->unique()
                ->values();

            if ($options->isEmpty()) {
                $options->push('1');
            }

            foreach ($options as $option) {
                $hotelAmounts[$option] = ($hotelAmounts[$option] ?? 0)
                    + (float) ($item->price->final_price ?? 0);
            }
        }

        $optionTotals = [];

        ksort($hotelAmounts, SORT_NUMERIC);

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
