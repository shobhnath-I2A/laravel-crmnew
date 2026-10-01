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

            $itineraryBuilder = Itinerary::with('addedBy')->where('queryId', 0);

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
    public function create(Request $request)
    {
        $queryId = $request->query('queryId');

        return view('itinerary.add-itinerary', compact('queryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
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
                'queryId' => 'nullable|integer',
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
            $validated['queryId'] = $request->queryId ?? 0;
            $validated['created_by'] = auth()->id();

            $itinerary = DB::transaction(function () use ($validated, $destinationIds) {
                $itinerary = Itinerary::create($validated);
                $itinerary->destinations()->sync($destinationIds);
                if ($itinerary->queryId) { \App\Services\QueryHistory::record($itinerary->queryId, 'proposal_created', 'Proposal #'.$itinerary->id.' created'); }
                return $itinerary;
            });

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
            $itinerary = Itinerary::with('destinations')->findOrFail($id);

            // create package
            $package = app(PackageService::class)->createFromItinerary($id);

            $dayItems = PackageDayItem::with('destination')
                ->where('package_id', $package->id)
                ->get()
                ->keyBy('day');

            $tab = $request->query('tab', 'proposals');

            $startDate = Carbon::parse($itinerary->start_date);
            $endDate   = Carbon::parse($itinerary->end_date);

            return view('itinerary.view-itinerary', compact(
                'itinerary',
                'startDate',
                'endDate',
                'tab',
                'package',
                'dayItems'
            ));
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
                'queryId' => 'nullable|integer',

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
            $validated['queryId'] = $request->queryId ?? 0;
            DB::transaction(function () use ($itinerary, $validated, $destinationIds, $id) {
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
            });
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
        DB::beginTransaction();
        try {
            $itinerary = Itinerary::with([
                'packages.dayItems.hotelDetail',
                'packages.dayItems.flightDetail',
                'destinations'
            ])->findOrFail($id);

            // Remove destination pivot records
            $itinerary->destinations()->detach();
            foreach ($itinerary->packages as $package) {
                foreach ($package->dayItems as $dayItem) {
                    // Delete hotel detail
                    if ($dayItem->hotelDetail) {
                        $dayItem->hotelDetail()->delete();
                    }
                    // Delete flight detail
                    if ($dayItem->flightDetail) {
                        $dayItem->flightDetail()->delete();
                    }
                    // Delete day item
                    $dayItem->delete();
                }
                // Delete package
                $package->delete();
            }

            // Delete itinerary
            $itinerary->delete();
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Itinerary deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Delete itinerary failed', [
                'id' => $id,
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // public function getDayDetails(Request $request)
    // {
    //     try {
    //         $package = Package::where('itinerary_id', $request->itinerary_id)->firstOrFail();
    //         // UPDATE destination if passed
    //         if ($request->filled('destination_id')) {
    //             PackageDayItem::where('package_id', $package->id)
    //                 ->where('day', $request->day)
    //                 ->update([
    //                     'destination_id' => $request->destination_id
    //                 ]);
    //         }

    //         // $PackageDayItem = PackageDayItem::where('package_id', $package->id)
    //         //     ->where('day', $request->day)
    //         //     ->first();
    //         $packageDayItems = PackageDayItem::with('destination')
    //             ->where('package_id', $package->id)
    //             ->where('day', $request->day)
    //             ->get()
    //             ->groupBy('type');
    //         // dd($items);
    //         $day = $request->day;
    //         $destinationId = $request->destination_id;
    //         $itineryId = $request->itinerary_id;
    //         $date = Carbon::parse($request->date)->format('d M - D');

    //         return view('itinerary.itinerary-days-details', compact('packageDayItems', 'day', 'destinationId', 'date', 'itineryId'));
    //     } catch (\Exception $e) {

    //         Log::error('Unable to get day detail', [
    //             'message' => $e->getMessage()
    //         ]);

    //         return response()->json(['error' => true], 500);
    //     }
    // }
    public function getDayDetails(Request $request)
    {
        $request->validate(['itinerary_id' => 'required|integer|exists:itineraries,id', 'day' => 'required|integer|min:1', 'date' => 'required|date', 'destination_id' => 'nullable|integer|exists:destinations,id']);
        try {
            $package = Package::where('itinerary_id', $request->itinerary_id)->firstOrFail();

            if ($request->filled('destination_id')) {
                $parent = $package->itinerary->queryData;
                $existingDestination = $package->dayItems()->where('day', $request->day)->where('type', 'daydetail')->value('destination_id');
                if ($parent && ($parent->invoice()->exists() || $parent->supplierBookings()->exists()) && (int) $existingDestination !== (int) $request->destination_id) {
                    abort(409, 'Cannot change a booked proposal.');
                }
                PackageDayItem::where('package_id', $package->id)
                    ->where('day', $request->day)
                    ->update([
                        'destination_id' => $request->destination_id
                    ]);
            }

            $packageDayItems = PackageDayItem::selectedForAcceptance($package->itinerary->accepted_hotel_option)->with([
                'destination',
                'flightDetail',
                'hotelDetail',
            ])
                ->where('package_id', $package->id)
                ->where('day', $request->day)
                ->orderBy('day_order')
                ->get()
                ->groupBy('type');

            $day = $request->day;
            $destinationId = $request->destination_id;
            $itineryId = $request->itinerary_id;
            $date = Carbon::parse($request->date)->format('d M - D');

            return view('itinerary.itinerary-days-details', compact(
                'packageDayItems',
                'day',
                'destinationId',
                'date',
                'itineryId'
            ));
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
            $html .= '<option value="' . (int) $hotel->id . '">' . e($hotel->name) . '</option>';
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
        $source = Itinerary::findOrFail($id);
        $copy = app(\App\Services\ItineraryCopy::class)->copy($source, (int) $source->queryId);
        return response()->json(['status' => true, 'message' => 'Itinerary duplicated successfully', 'id' => $copy->id]);
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
        $data = $request->validate(['hotel_options' => 'required|in:1,2,3']);
        $itinerary = Itinerary::findOrFail($id);
        abort_unless($itinerary->queryId, 422, 'Insert the template into a query before accepting it.');
        DB::transaction(function () use ($itinerary, $data) {
            // Every acceptance for this query serializes on the same parent row.
            $query = Query::whereKey($itinerary->queryId)->lockForUpdate()->firstOrFail();
            $itinerary->refresh();
            if ($query->invoice()->exists() || $query->supplierBookings()->exists()) {
                throw ValidationException::withMessages(['hotel_options' => 'This query has billing or supplier bookings. Resolve those records before changing the accepted proposal.']);
            }
            $package = $itinerary->packages()->firstOrFail();
            $hasHotels = $package->dayItems()->where('type', 'accommodation')->whereHas('hotelDetail')->exists();
            if ($hasHotels && !$package->dayItems()->where('type', 'accommodation')->whereHas('hotelDetail', fn ($q) => $q->where('hotel_options', $data['hotel_options'])->orWhereNull('hotel_options'))->exists()) {
                throw ValidationException::withMessages(['hotel_options' => 'The selected hotel option does not exist.']);
            }
            $query->itineraries()->where('status', 1)->update(['status' => 0, 'accepted_hotel_option' => null]);
            $itinerary->update(['status' => 1, 'accepted_hotel_option' => $data['hotel_options']]);
            $query->update(['statusId' => 5]);
            \App\Services\QueryHistory::record($query->id, 'proposal_accepted', 'Proposal #'.$itinerary->id.' accepted', 'Hotel option '.$data['hotel_options']);
        });
        return response()->json(['status' => true, 'message' => 'Itinerary confirmed successfully', 'redirect_url' => route('itineraries.show', $itinerary->id)]);
    }

    public function finalItinerary(String $id)
    {
        $itinerary = Itinerary::findOrFail($id);

        return view('itinerary.final-itinerary', compact('itinerary'));
    }

    public function insertItinerary(Request $request)
    {
        $queryId = $request->query('queryId');

        $itineraries = Itinerary::with(['destinations', 'addedBy'])
            ->where('queryId', 0)
            ->latest()
            ->paginate(20);

        return view('itinerary.popups.insert-itinerary', compact('itineraries', 'queryId'));
    }

    public function insertToQuery(Request $request, Itinerary $itinerary)
    {
        $data = $request->validate(['queryId' => 'required|integer|exists:queries,id']);
        \App\Services\QueryAccess::find($data['queryId']);
        $copy = app(\App\Services\ItineraryCopy::class)->copy($itinerary, (int) $data['queryId'], false);
        return response()->json(['status' => true, 'message' => 'Itinerary inserted successfully.', 'redirect' => route('queries.show', ['id' => $copy->queryId, 'tab' => 'proposals'])]);
    }

    public function share(Itinerary $itinerary)
    {
        // An internal staff link. Public/guest sharing requires a separately agreed access policy.
        return redirect()->route('itineraries.show', $itinerary->id);
    }
}
