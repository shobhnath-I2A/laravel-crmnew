<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Itinerary;
use App\Models\PackageDayItem;
use App\Services\ItineraryPricingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShareItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $itinerary = Itinerary::with(['queryData', 'destinations'])
            ->findOrFail($id);

        return view('itinerary.popups.itineraries-share', compact('itinerary'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function updateSharing(Request $request, string $id): JsonResponse
    {
        $data = $request->validate([
            'linkSharing' => ['required', 'boolean'],
        ]);
        $itinerary = Itinerary::findOrFail($id);
        $enabled = (bool) $data['linkSharing'];

        $itinerary->public_share_enabled = $enabled;
        if ($enabled) {
            $itinerary->public_share_price_token = Str::random(64);
            $itinerary->public_share_no_price_token = Str::random(64);
        }
        $itinerary->save();

        return response()->json([
            'enabled' => $enabled,
            'withPriceUrl' => $enabled
                ? route('itinerary-share.public', $itinerary->public_share_price_token)
                : '',
            'withoutPriceUrl' => $enabled
                ? route('itinerary-share.public', $itinerary->public_share_no_price_token)
                : '',
            'phone' => $itinerary->queryData?->mobile,
        ]);
    }

    public function publicShow(string $token)
    {
        $itinerary = Itinerary::with(['queryData', 'destinations', 'packageTheme', 'packages', 'addedBy'])
            ->where('public_share_enabled', true)
            ->where(function ($query) use ($token) {
                $query->where('public_share_price_token', $token)
                    ->orWhere('public_share_no_price_token', $token);
            })
            ->firstOrFail();

        $showPrice = hash_equals((string) $itinerary->public_share_price_token, $token);
        $package = $itinerary->packages->sortByDesc('id')->first();
        $packageIds = $itinerary->packages->pluck('id');
        $pricingItems = PackageDayItem::with(['hotels', 'hotelDetail', 'price'])
            ->whereIn('package_id', $packageIds)
            ->whereNotIn('type', ['daydetail', 'null', ''])
            ->whereNotNull('type')
            ->get();
        $priceTotals = app(ItineraryPricingService::class)->calculateHotelOptionTotals(
            $pricingItems,
            9,
            10,
            0,
            10,
            74,
            0
        )['optionTotals'];
        $selectedPriceOption = $itinerary->accepted_hotel_option ?? array_key_first($priceTotals);
        $packageTotal = $selectedPriceOption !== null
            ? ($priceTotals[$selectedPriceOption] ?? null)
            : null;

        $dayItems = $package
            ? $package->dayItems()
                ->with([
                    'destination',
                    'activity',
                    'hotelDetail.hotel',
                    'flightDetail',
                    'transportationMaster',
                ])
                ->where('status', 1)
                ->selectedForAcceptance($itinerary->accepted_hotel_option)
                ->orderBy('day')
                ->orderBy('day_order')
                ->get()
                ->groupBy('day')
            : collect();
        $countryCode = $itinerary->addedBy?->user_country ?? config('crm.default_country_code');
        $packageSettings = AppSetting::where('country_code', $countryCode)
            ->where('group_name', 'package_inclusions')
            ->pluck('value', 'key_name');
        $isPublic = true;

        return view('itinerary.final-itinerary', compact(
            'itinerary',
            'package',
            'dayItems',
            'packageSettings',
            'selectedPriceOption',
            'packageTotal',
            'showPrice',
            'isPublic'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
}
