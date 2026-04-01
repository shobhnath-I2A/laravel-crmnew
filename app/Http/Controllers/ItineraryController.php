<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itinerary;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\PackageDayItem;
use App\Models\Package;
use App\Services\PackageService;
use Illuminate\Validation\ValidationException;
use App\Models\Hotel;

use Exception;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $itineraryBuilder = Itinerary::query();

            if ($request->filled('keyword')) {
                $itineraryBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $itinerary = $itineraryBuilder->latest()->paginate(3);

            $itinerary->appends($request->all());

            $itineraryCount = Itinerary::count();
            return view('itinerary.index', compact('itinerary', 'itineraryCount'));
        } catch (\Exception $e) {
            Log::error('Error featching Itinerary', $e->getMessage());
            return view('itinerary.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('itinerary.add-itinerary');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'adult' => 'required|integer|min:1',
                'child' => 'nullable|integer|min:0',
                'destination_id' => 'required|array',
                'destination_id.*' => 'exists:destinations,id',
                'notes' => 'nullable|string',
                'package_theme_id' => 'nullable|integer',
                'show_website' => 'nullable|integer',
                'website_cost' => 'required|numeric',
                'website_validity' => 'required|date',
                'show_in_popular' => 'nullable|integer',
                'show_in_special' => 'nullable|integer',
                'about_package' => 'nullable|string',
            ]);

            // Extract destination IDs
            $destinationIds = $validated['destination_id'];
            unset($validated['destination_id']);
            //  Format Dates
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            $validated['start_date'] = $start->format('Y-m-d');
            $validated['end_date'] = $end->format('Y-m-d');
            $validated['website_validity'] = Carbon::parse($request->website_validity)->format('Y-m-d');

            //  Calculate Days
            $validated['total_days'] = (int) ceil($start->floatDiffInDays($end)) + 1;

            $validated['child'] = $validated['child'] ?? 0;
            $itinerary = Itinerary::create($validated);

            $itinerary->destinations()->sync($destinationIds);

            return response()->json([
                'status' => true,
                'message' => 'Itinerary Created Successfully',
                'data' => $itinerary
            ]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        try {
            $itinerary = Itinerary::findOrFail($id);
            // create package
            $package = app(PackageService::class)->createFromItinerary($id);
            $dayItems = PackageDayItem::where('package_id', $package->id)
                        ->get()
                        ->keyBy('day');
            $tab = $request->query('tab', 'proposals');
            $startDate = Carbon::parse($itinerary->start_date);
            $endDate   = Carbon::parse($itinerary->end_date);

            return view('itinerary.view-itinerary', compact('itinerary', 'startDate', 'endDate', 'tab', 'package', 'dayItems'));
        } catch (\Exception $e) {
            Log::error('Error fetching itinerary: ' . $e->getMessage());

            return redirect()->route('itineraries.index')
                ->with('error', 'Itinerary not found.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $itinerary = Itinerary::findOrFail($id);
            return view('itinerary.edit-itinerary', compact('itinerary'));
        } catch (\Exception $e) {
            Log::error('Error fetching Itinerary: ' . $e->getMessage());
            return redirect()->route('itineraries.index')
                ->with('error', 'Itinerary not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'adult' => 'required|integer|min:1',
                'child' => 'nullable|integer|min:0',
                'destination_id' => 'required|array',
                'destination_id.*' => 'exists:destinations,id',
                'notes' => 'nullable|string',
                'package_theme_id' => 'nullable|integer',
                'show_website' => 'nullable|integer',
                'website_cost' => 'required|numeric',
                'website_validity' => 'required|date',
                'show_in_popular' => 'nullable|integer',
                'show_in_special' => 'nullable|integer',
                'about_package' => 'nullable|string',
            ]);

            $itinerary = Itinerary::findOrFail($id);
            // Extract destinations
            $destinationIds = $validated['destination_id'];
            unset($validated['destination_id']);

            //  Format Dates
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            $validated['start_date'] = $start->format('Y-m-d');
            $validated['end_date'] = $end->format('Y-m-d');
            $validated['website_validity'] = Carbon::parse($request->website_validity)->format('Y-m-d');

            //  Calculate Days
            $validated['total_days'] = (int) ceil($start->floatDiffInDays($end)) + 1;

            $validated['child'] = $validated['child'] ?? 0;
            $itinerary->update($validated);

            // VERY IMPORTANT: update pivot table
            $itinerary->destinations()->sync($destinationIds);
            // dd($itinerary);

            // Update package
            $package = Package::where('itinerary_id', $id)->first();
            if ($package) {
                app(\App\Services\PackageService::class)
                    ->syncWithItinerary($package, $itinerary);
            }
            return response()->json([
                'status' => true,
                'message' => 'Itinerary updated Successfully',
                'data' => $itinerary
            ]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function getDayDetails(Request $request)
    {
        try {
            $package = Package::where('itinerary_id', $request->itinerary_id)->firstOrFail();
            // UPDATE destination if passed
            if ($request->filled('destination_id')) {
                PackageDayItem::where('package_id', $package->id)
                    ->where('day', $request->day)
                    ->update([
                        'destination_id' => $request->destination_id
                    ]);
            }

            // $PackageDayItem = PackageDayItem::where('package_id', $package->id)
            //     ->where('day', $request->day)
            //     ->first();
           $packageDayItems = PackageDayItem::with('destination')
                ->where('package_id', $package->id)
                ->where('day', $request->day)
                ->get()
                ->groupBy('type');
            // dd($items);
            $day = $request->day;
            $destinationId = $request->destination_id;
            $itineryId = $request->itinerary_id;
            $date = Carbon::parse($request->date)->format('d M - D');

            return view('itinerary.itinerary-days-details', compact('packageDayItems', 'day', 'destinationId', 'date', 'itineryId'));
        } catch (\Exception $e) {

            Log::error('Unable to get day detail', [
                'message' => $e->getMessage()
            ]);

            return response()->json(['error' => true], 500);
        }
    }


    public function createAccomodation(){
        return view('itinerary.popups.accommodation');
    }

    public function storeAccomodation(Request $request){
        dd($request);
    }

    public function loadHotels(Request $request)
    {
        $hotels = Hotel::where('destination', $request->destinationName)->get();
        return view('package-day-items.popups.hotel-options', compact('hotels'));
    }
   public function loadHotelData(Request $request)
    {
        $hotel = Hotel::with(['rates', 'roomTypes'])
            ->find($request->hotel_id);

        if (!$hotel) {
            return response()->json([
                'roomTypes' => [],
                'price' => 0
            ]);
        }

        $roomTypes = $hotel->roomTypes->map(function ($room) {
            return [
                'id' => $room->id,
                'name' => $room->name
            ];
        });

        $rate = $hotel->rates->first();

        return response()->json([
            'roomTypes' => $roomTypes,
            'meal'  => $rate->meal_plan ?? '',
            'price' => $rate->double ?? 0
        ]);
    }
    // public function loadHotelData(Request $request)
    // {
    //     $hotel = Hotel::with('rates')->find($request->hotelnamemaster);

    //     dd($hotel);
    //     if (!$hotel || $hotel->rates->isEmpty()) {
    //         return response()->json([
    //             'room' => '',
    //             'price' => 0
    //         ]);
    //     }

    //     //  Get first rate (or you can filter later)
    //     $rate = $hotel->rates->first();

    //     return response()->json([
    //         'room'  => $rate->room_type ?? '',
    //         'meal'  => $rate->meal_plan ?? '',
    //         'price' => $rate->double ?? 0 // you can choose single/double
    //     ]);
    // }
}
