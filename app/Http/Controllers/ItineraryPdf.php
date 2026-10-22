<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\Itinerary;
use App\Models\PackageDayItem;
use App\Services\ItineraryPricingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ItineraryPdf extends Controller
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
    public function create (string $id)
    {
       return view('itinerary.popups.exports',['queryId' => $id]);
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
        $itinerary = Itinerary::with([
            'queryData',
            'destinations',
            'packageTheme',
            'packages',
        ])->findOrFail($id);

        $package = $itinerary->packages->sortByDesc('id')->first();
        $packageIds = $itinerary->packages->pluck('id');
        $pricingItems = PackageDayItem::with(['hotels', 'hotelDetail', 'price'])
            ->whereIn('package_id', $packageIds)
            ->whereNotIn('type', ['daydetail', 'null', ''])
            ->whereNotNull('type')
            ->get();

        $pricing = app(ItineraryPricingService::class)->calculateHotelOptionTotals(
            $pricingItems,
            9,
            10,
            0,
            10,
            74,
            0
        );
        $priceTotals = $pricing['optionTotals'];
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
        $dayItems->each(function ($items) {
            $items->each(function ($item) {
                $image = match ($item->type) {
                    'accommodation' => $item->hotelDetail?->hotel?->image,
                    'activity' => $item->activity?->image,
                    'transportation' => $item->transportationMaster?->image,
                    default => null,
                };

                $item->setAttribute('pdf_image', $this->resolvePdfImage($image));
            });
        });

        $countryCode = auth()->user()?->user_country ?? config('crm.default_country_code');
        $settings = AppSetting::where('country_code', $countryCode)
            ->whereIn('group_name', ['package_inclusions', 'organisation', 'default'])
            ->get()
            ->groupBy('group_name')
            ->map(fn ($group) => $group->pluck('value', 'key_name'));

        $pdf = Pdf::loadView('itinerary.pdf.package-pdf', [
            'itinerary' => $itinerary,
            'package' => $package,
            'dayItems' => $dayItems,
            'packageTotal' => $packageTotal,
            'selectedPriceOption' => $selectedPriceOption,
            'pricingItems' => $pricingItems,
            'organisationSettings' => $settings->get('organisation', collect()),
            'packageSettings' => $settings->get('package_inclusions', collect()),
            'defaultSettings' => $settings->get('default', collect()),
        ])->setPaper('a4', 'portrait');
        return $pdf->stream("itinerary-{$id}.pdf");
    }

    private function resolvePdfImage(?string $image): ?string
    {
        if (!$image || parse_url($image, PHP_URL_SCHEME)) {
            return null;
        }

        $relativePath = ltrim($image, '/\\');
        $disk = Storage::disk('public');
        $diskRoot = realpath($disk->path(''));
        $diskImage = realpath($disk->path($relativePath));

        if (
            $diskRoot
            && $diskImage
            && str_starts_with($diskImage, $diskRoot . DIRECTORY_SEPARATOR)
        ) {
            return $diskImage;
        }

        $publicRoot = realpath(public_path());
        $imagePath = realpath(public_path($relativePath));

        if (
            $publicRoot
            && $imagePath
            && str_starts_with($imagePath, $publicRoot . DIRECTORY_SEPARATOR)
        ) {
            return $imagePath;
        }

        return null;
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
