<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Package;
use App\Models\Itinerary;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function storeFromItinerary(Request $request, $itineraryId)
    {
        // 1. Get itinerary
        $itinerary = Itinerary::with('destinations')->findOrFail($itineraryId);

        // 2. Use transaction (VERY IMPORTANT)
        $package = DB::transaction(function () use ($itinerary) {

            // 3. Create package
            $package = Package::create([
                'name' => $itinerary->name,
                'description' => $itinerary->description ?? null,
                'start_date' => $itinerary->start_date,
                'end_date' => $itinerary->end_date,
                'total_days' => $itinerary->total_days,
                'price_per_person' => $itinerary->website_cost ?? 0,
                'itinerary_id' => $itinerary->id,
                'created_by' => auth()->id() ?? null,
                'show_on_website' => 1,
            ]);

            // ✅ 4. Attach destinations (pivot table)
            if ($itinerary->destinations->isNotEmpty()) {
                $package->destinations()->sync(
                    $itinerary->destinations->pluck('id')->toArray()
                );
            }

            return $package;
        });

        return response()->json([
            'message' => 'Package created successfully',
            'data' => $package
        ]);
    }
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
    public function show(string $id)
    {
        //
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
