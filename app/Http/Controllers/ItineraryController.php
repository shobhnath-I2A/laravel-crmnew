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
use App\Models\Query;
use App\Services\PackageService;
use Illuminate\Validation\ValidationException;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

use Exception;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $itineraryBuilder = Itinerary::where('queryId', 0);

            if ($request->filled('keyword')) {
                $itineraryBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $itineraryCount = (clone $itineraryBuilder)->count();

            $itinerary = $itineraryBuilder
                ->latest()
                ->paginate(20);

            $itinerary->appends($request->all());

            return view('itinerary.index', compact(
                'itinerary',
                'itineraryCount'
            ));
        } catch (\Exception $e) {

            Log::error('Error fetching Itinerary: ' . $e->getMessage());

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
        } catch (ValidationException $ve) {
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
    public function destroy(string $id) {}

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


    public function createAccomodation()
    {
        return view('itinerary.popups.accommodation');
    }

    public function storeAccomodation(Request $request)
    {
        dd($request);
    }
    public function loadHotels(Request $request)
    {
        $destinationId = $request->destination_id;

        $hotels = Hotel::where('destination_id', $destinationId)
            ->orderBy('name')
            ->get();

        $html = '<option value="">Select Hotel</option>';

        foreach ($hotels as $hotel) {
            $html .= '<option value="' . $hotel->id . '">' . $hotel->name . '</option>';
        }

        return response($html);
    }
    public function loadHotelData(Request $request)
    {
        $hotel = Hotel::with('roomTypes')->findOrFail($request->hotel_id);

        return response()->json([
            'hotel' => $hotel,
            'roomTypes' => $hotel->roomTypes->map(function ($room) {
                return [
                    'id' => $room->id,
                    'name' => $room->name,
                ];
            }),
        ]);
    }
    public function duplicate($id)
    {
        DB::beginTransaction();

        try {

            $oldItinerary = Itinerary::with('destinations')->findOrFail($id);

            // 1. Duplicate itinerary
            $newItinerary = $oldItinerary->replicate();
            $newItinerary->name = $oldItinerary->name . ' Copy';
            $newItinerary->created_at = now();
            $newItinerary->updated_at = now();
            $newItinerary->save();

            // 2. Duplicate itinerary destinations
            $newItinerary->destinations()->sync(
                $oldItinerary->destinations->pluck('id')->toArray()
            );

            // 3. Find old package
            $oldPackage = Package::where('itinerary_id', $oldItinerary->id)->first();

            if ($oldPackage) {

                // 4. Duplicate package
                $newPackage = $oldPackage->replicate();

                $newPackage->itinerary_id = $newItinerary->id;

                // If your package table has this spelling also
                if (isset($newPackage->itinery_id)) {
                    $newPackage->itinery_id = $newItinerary->id;
                }

                $newPackage->created_at = now();
                $newPackage->updated_at = now();
                $newPackage->save();

                // 5. Duplicate package day items
                $oldDayItems = PackageDayItem::where('package_id', $oldPackage->id)->get();

                foreach ($oldDayItems as $oldItem) {
                    $newItem = $oldItem->replicate();
                    $newItem->package_id = $newPackage->id;
                    $newItem->created_at = now();
                    $newItem->updated_at = now();
                    $newItem->save();
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Itinerary duplicated successfully',
                'id' => $newItinerary->id
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Duplicate itinerary failed: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function archive($id)
    {
        try {

            $itinerary = Itinerary::findOrFail($id);

            $itinerary->update([
                'status' => 3
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Itinerary archived successfully'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function unarchive($id)
    {
        try {

            $itinerary = Itinerary::findOrFail($id);

            $itinerary->update([
                'status' => 0
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Itinerary restored successfully'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function markAccepted(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'hotel_options' => 'required|in:1,2,3',
            ]);

            $itinerary = Itinerary::findOrFail($id);

            $package = Package::where('itinerary_id', $itinerary->id)->firstOrFail();

            $queryId = $itinerary->queryId;
            $confirmedOption = (int) $request->hotel_options;

            /*
        |--------------------------------------------------------------------------
        | Delete other hotel options from accommodation
        |--------------------------------------------------------------------------
        */
            PackageDayItem::where('package_id', $package->id)
                ->where('type', 'Accommodation')
                ->whereIn('hotel_options', array_diff([1, 2, 3], [$confirmedOption]))
                ->delete();

            /*
        |--------------------------------------------------------------------------
        | Reset all itineraries of this query
        |--------------------------------------------------------------------------
        */
            Itinerary::where('queryId', $queryId)
                ->update([
                    'status' => 0,
                    // 'confirmed_by' => null,
                    // 'confirm_date' => null,
                ]);

            /*
        |--------------------------------------------------------------------------
        | Mark selected itinerary accepted
        |--------------------------------------------------------------------------
        */
            $itinerary->update([
                'status' => 1,
                // 'confirmed_by' => auth()->id(),
                // 'confirm_date' => now(),
            ]);

            /*
        |--------------------------------------------------------------------------
        | Update query status
        |--------------------------------------------------------------------------
        */
            Query::where('id', $queryId)->update([
                'statusid' => 9,
            ]);

            /*
        |--------------------------------------------------------------------------
        | Optional: update invoice/payment tables if models exist
        |--------------------------------------------------------------------------
        */
            // InvoiceMaster::where('queryId', $queryId)->update([
            //     'package_id' => $package->id,
            // ]);
            //
            // PackagePayment::where('queryId', $queryId)->update([
            //     'package_id' => $package->id,
            // ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Itinerary confirmed successfully',
                'redirect_url' => route('itineraries.show', $itinerary->id),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    // public function markAccepted($id)
    // {
    //     DB::beginTransaction();

    //     try {

    //         $itinerary = Itinerary::findOrFail($id);

    //         // Remove accepted status from all itineraries
    //         // of the same query
    //         Itinerary::where('queryId', $itinerary->queryId)
    //             ->update([
    //                 'status' => 0
    //             ]);

    //         // Mark selected itinerary accepted
    //         $itinerary->update([
    //             'status' => 1
    //         ]);

    //         DB::commit();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Itinerary accepted successfully'
    //         ]);
    //     } catch (\Exception $e) {

    //         DB::rollBack();

    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function finalItinerary(String $id)
    {
        $itinerary = Itinerary::findOrFail($id);

        return view('itinerary.final-itinerary', compact('itinerary'));
    }
}
