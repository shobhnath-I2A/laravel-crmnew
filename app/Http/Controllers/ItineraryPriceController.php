<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itinerary;
use App\Models\PackageDayItem;

class ItineraryPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $itinerary = Itinerary::with([
            'destinations',
            'packages.dayItems' => function ($q) {
                $q->whereNotIn('type', ['daydetail', 'null', ''])
                    ->whereNotNull('type')
                    ->with(['hotels', 'price'])
                    ->orderBy('day')
                    ->orderBy('id');
            },
        ])->findOrFail($id);

        $dayItems = $itinerary->packages
            ->flatMap(fn($package) => $package->dayItems);

        $dayWiseItems = $dayItems->groupBy('day');

        $adult = max((int) $itinerary->adult, 0);
        $child = max((int) $itinerary->child, 0);
        $totalPax = max($adult + $child, 1);

        $totalNet = $dayItems->sum(fn($item) => (float) ($item->price->total_price ?? 0));
        $totalMarkup = $dayItems->sum(fn($item) => (float) ($item->price->markup_amount ?? 0));
        $totalGross = $dayItems->sum(fn($item) => (float) ($item->price->final_price ?? 0));

        $withoutHotelGross = $dayItems
            ->where('type', '!=', 'accommodation')
            ->sum(fn($item) => (float) ($item->price->final_price ?? 0));

        $hotelOptionTotals = [];

        foreach ($dayItems->where('type', 'accommodation') as $item) {
            $option = $item->hotels->first()?->pivot?->hotel_options ?? 1;

            if (!isset($hotelOptionTotals[$option])) {
                $hotelOptionTotals[$option] = 0;
            }

            $hotelOptionTotals[$option] += (float) ($item->price->final_price ?? 0);
        }

        $billingType = 1;
        $gstType = 0;

        $cgst = 9;
        $sgst = 10;
        $igst = 0;
        $tcs = 10;
        $discount = 0;
        $extraMarkup = 74;

        $baseAmount = $billingType == 2
            ? round($totalGross / $totalPax, 2)
            : $totalGross;

        $taxableAmount = $gstType == 1
            ? $totalMarkup
            : $baseAmount;

        $cgstAmount = ($taxableAmount * $cgst) / 100;
        $sgstAmount = ($taxableAmount * $sgst) / 100;
        $igstAmount = ($taxableAmount * $igst) / 100;
        $tcsAmount = ($baseAmount * $tcs) / 100;

        $billingTotal = $baseAmount
            + $extraMarkup
            + $cgstAmount
            + $sgstAmount
            + $igstAmount
            + $tcsAmount
            - $discount;

        return view('itinerary.price.itinerary-price', compact(
            'itinerary',
            'dayItems',
            'dayWiseItems',
            'adult',
            'child',
            'totalPax',
            'totalNet',
            'totalMarkup',
            'totalGross',
            'withoutHotelGross',
            'hotelOptionTotals',
            'billingType',
            'gstType',
            'cgst',
            'sgst',
            'igst',
            'tcs',
            'discount',
            'extraMarkup',
            'baseAmount',
            'taxableAmount',
            'cgstAmount',
            'sgstAmount',
            'igstAmount',
            'tcsAmount',
            'billingTotal'
        ));
    }
    // public function index($id)
    // {
    //     $itinerary = Itinerary::with([
    //         'destinations',

    //         'packages.dayItems' => function ($q) {
    //             $q->whereNotIn('type', ['daydetail', 'null', ''])
    //                 ->whereNotNull('type')
    //                 ->with(['hotels', 'price'])
    //                 ->orderBy('day')
    //                 ->orderBy('id');
    //         },
    //     ])->findOrFail($id);

    //     $dayItems = $itinerary->packages
    //         ->flatMap(fn ($package) => $package->dayItems);

    //     $dayWiseItems = $dayItems->groupBy('day');

    //     $totalNet = $dayItems->sum(fn($item) => $item->price->total_price ?? 0);
    //     $totalMarkup = $dayItems->sum(fn($item) => $item->price->markup_amount ?? 0);
    //     $totalGross = $dayItems->sum(fn($item) => $item->price->final_price ?? 0);

    //     $cgstPercent = 9;
    //     $sgstPercent = 10;
    //     $igstPercent = 0;
    //     $tcsPercent = 10;
    //     $discount = 0;

    //     $cgstAmount = ($totalGross * $cgstPercent) / 100;
    //     $sgstAmount = ($totalGross * $sgstPercent) / 100;
    //     $igstAmount = ($totalGross * $igstPercent) / 100;
    //     $tcsAmount = ($totalGross * $tcsPercent) / 100;

    //     $billingTotal = $totalGross + $cgstAmount + $sgstAmount + $igstAmount + $tcsAmount - $discount;

    //     return view('itinerary.price.itinerary-price', compact(
    //         'itinerary',
    //         'dayItems',
    //         'dayWiseItems',
    //         'totalNet',
    //         'totalMarkup',
    //         'totalGross',
    //         'cgstPercent',
    //         'sgstPercent',
    //         'igstPercent',
    //         'tcsPercent',
    //         'discount',
    //         'cgstAmount',
    //         'sgstAmount',
    //         'igstAmount',
    //         'tcsAmount',
    //         'billingTotal'
    //     ));
    // }
    // public function index($id)
    // {
    //     $itinerary = Itinerary::with([
    //         'destinations',
    //         'packages.dayItems' => function ($q) {
    //             $q->whereNotIn('type', ['daydetail', 'null', ''])
    //                 ->whereNotNull('type')
    //                 ->orderBy('day')
    //                 ->orderBy('id');
    //         },
    //         'packages.dayItems.hotels',
    //     ])->findOrFail($id);

    //     $dayItems = $itinerary->packages
    //         ->flatMap(fn($package) => $package->dayItems);

    //     $dayWiseItems = $dayItems->groupBy('day');

    //     return view('itinerary.price.itinerary-price', compact(
    //         'itinerary',
    //         'dayItems',
    //         'dayWiseItems'
    //     ));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('itinerary.price.edit-price');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageDayItem $item)
    {
        // dd($item);
        return view('itinerary.price.edit-price', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // public function editPricing(PackageDayItem $item)
    // {
    //     return view('itinerary.price.edit-pricing', compact('item'));
    // }

    public function updatePricing(Request $request, PackageDayItem $item)
    {
        $validated = $request->validate([
            'adult_cost'        => 'nullable|numeric|min:0',
            'child_cost'        => 'nullable|numeric|min:0',
            'vehicle'           => 'nullable|integer|min:0',
            'vehicle_cost'      => 'nullable|numeric|min:0',

            'single_room_cost'  => 'nullable|numeric|min:0',
            'double_room_cost'  => 'nullable|numeric|min:0',
            'triple_room_cost'  => 'nullable|numeric|min:0',
            'quad_room_cost'    => 'nullable|numeric|min:0',
            'child_bed_cost'    => 'nullable|numeric|min:0',
            'extra_adult_cost'  => 'nullable|numeric|min:0',

            'markup'            => 'nullable|numeric|min:0',
        ]);

        $markup = (float) ($validated['markup'] ?? 0);

        $adultCost       = (float) ($validated['adult_cost'] ?? 0);
        $childCost       = (float) ($validated['child_cost'] ?? 0);
        $vehicle         = (int) ($validated['vehicle'] ?? 0);
        $vehicleCost     = (float) ($validated['vehicle_cost'] ?? 0);

        $singleRoomCost  = (float) ($validated['single_room_cost'] ?? 0);
        $doubleRoomCost  = (float) ($validated['double_room_cost'] ?? 0);
        $tripleRoomCost  = (float) ($validated['triple_room_cost'] ?? 0);
        $quadRoomCost    = (float) ($validated['quad_room_cost'] ?? 0);
        $childBedCost    = (float) ($validated['child_bed_cost'] ?? 0);
        $extraAdultCost  = (float) ($validated['extra_adult_cost'] ?? 0);

        $totalPrice = match ($item->type) {
            'transportation' => $vehicle * $vehicleCost,

            'accommodation' => $singleRoomCost
                + $doubleRoomCost
                + $tripleRoomCost
                + $quadRoomCost
                + $childBedCost
                + $extraAdultCost,

            default => $adultCost + $childCost,
        };

        $markupAmount = ($totalPrice * $markup) / 100;
        $finalPrice = $totalPrice + $markupAmount;

        $pricingData = [
            'item_type' => $item->type,
            'adult_cost' => $adultCost,
            'child_cost' => $childCost,
            'vehicle' => $vehicle,
            'vehicle_cost' => $vehicleCost,
            'single_room_cost' => $singleRoomCost,
            'double_room_cost' => $doubleRoomCost,
            'triple_room_cost' => $tripleRoomCost,
            'quad_room_cost' => $quadRoomCost,
            'child_bed_cost' => $childBedCost,
            'extra_adult_cost' => $extraAdultCost,
        ];

        $item->price()->updateOrCreate(
            ['package_day_item_id' => $item->id],
            [
                'adult_cost'       => $adultCost,
                'child_cost'       => $childCost,
                'vehicle'          => $vehicle,
                'vehicle_cost'     => $vehicleCost,

                'single_room_cost' => $singleRoomCost,
                'double_room_cost' => $doubleRoomCost,
                'triple_room_cost' => $tripleRoomCost,
                'quad_room_cost'   => $quadRoomCost,
                'child_bed_cost'   => $childBedCost,
                'extra_adult_cost' => $extraAdultCost,

                'total_price'      => $totalPrice,
                'markup'           => $markup,
                'markup_amount'    => $markupAmount,
                'final_price'      => $finalPrice,
                'pricing_data'     => $pricingData,
            ]
        );

        return response()->json([
            'status' => true,
            'message' => 'Pricing updated successfully',
            'total_price' => number_format($totalPrice, 2),
            'final_price' => number_format($finalPrice, 2),
        ]);
    }
}
