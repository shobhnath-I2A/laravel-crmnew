<?php

namespace Tests\Unit;

use App\Services\ItineraryPricingService;
use PHPUnit\Framework\TestCase;

class ItineraryPricingServiceTest extends TestCase
{
    public function test_it_calculates_totals_for_every_existing_hotel_option(): void
    {
        $sharedItem = (object) [
            'type' => 'Accommodation',
            'price' => (object) ['final_price' => 100],
            'hotels' => collect([
                (object) ['pivot' => (object) ['hotel_options' => 1]],
                (object) ['pivot' => (object) ['hotel_options' => 2]],
            ]),
            'hotelDetail' => null,
        ];
        $thirdOptionItem = (object) [
            'type' => 'accommodation',
            'price' => (object) ['final_price' => 200],
            'hotels' => collect(),
            'hotelDetail' => (object) ['hotel_options' => 3],
        ];
        $activity = (object) [
            'type' => 'Activity',
            'price' => (object) ['final_price' => 50],
            'hotels' => collect(),
            'hotelDetail' => null,
        ];

        $totals = (new ItineraryPricingService())->calculateHotelOptionTotals(
            collect([$sharedItem, $thirdOptionItem, $activity]),
            0,
            0,
            0,
            0,
            0,
            0
        );

        $this->assertSame([1, 2, 3], array_map('intval', array_keys($totals['optionTotals'])));
        $this->assertSame(150.0, $totals['optionTotals'][1]);
        $this->assertSame(150.0, $totals['optionTotals'][2]);
        $this->assertSame(250.0, $totals['optionTotals'][3]);
    }
}
