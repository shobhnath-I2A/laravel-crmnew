<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Itinerary;
use App\Models\PackageDayItem;
use App\Models\Query;
use App\Services\ItineraryPricingService;
use Illuminate\Http\Request;

class QuotationController extends Controller
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
    public function show(Request $request, string $id)
    {
        $query = $request->boolean('standalone')
            ? null
            : Query::with('destinationCity')->find($id);

        if ($query) {
            $itineraries = $query->itineraries()->with('destinations');

            if ($request->filled('itinerary')) {
                $itinerary = $itineraries->whereKey($request->query('itinerary'))->firstOrFail();
            } else {
                $itinerary = $itineraries
                    ->whereIn('status', [0, 1, 2])
                    ->latest('id')
                    ->first();
            }
        } else {
            $itinerary = Itinerary::with(['destinations', 'queryData'])
                ->findOrFail($request->query('itinerary', $id));
            $query = $itinerary->queryData;
        }

        $packages = $itinerary?->packages()->get() ?? collect();
        $package = $packages->sortByDesc('id')->first();
        $pricingItems = $packages->isNotEmpty()
            ? PackageDayItem::with(['hotels', 'hotelDetail', 'price'])
                ->whereIn('package_id', $packages->pluck('id'))
                ->whereNotIn('type', ['daydetail', 'null', ''])
                ->whereNotNull('type')
                ->get()
            : collect();
        $priceTotals = app(ItineraryPricingService::class)->calculateHotelOptionTotals(
            $pricingItems,
            9,
            10,
            0,
            10,
            74,
            0
        )['optionTotals'];
        $selectedPriceOption = $itinerary?->accepted_hotel_option
            ?? array_key_first($priceTotals);
        $packageTotal = $selectedPriceOption !== null
            ? ($priceTotals[$selectedPriceOption] ?? null)
            : null;

        $dayItems = $package
            ? PackageDayItem::with([
                'destination',
                'activity',
                'hotelDetail.hotel',
                'flightDetail',
                'transportationMaster',
            ])
                ->where('package_id', $package->id)
                ->where('status', 1)
                ->selectedForAcceptance($itinerary->accepted_hotel_option)
                ->orderBy('day')
                ->orderBy('day_order')
                ->get()
                ->groupBy('day')
            : collect();

        $countryCode = auth()->user()?->user_country ?? config('crm.default_country_code');
        $settings = AppSetting::where('country_code', $countryCode)
            ->whereIn('group_name', ['organisation', 'default'])
            ->get()
            ->groupBy('group_name')
            ->map(fn ($group) => $group->pluck('value', 'key_name'));

        return view('proposals.view-quotation', compact(
            'query',
            'itinerary',
            'dayItems',
            'settings',
            'packageTotal'
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
