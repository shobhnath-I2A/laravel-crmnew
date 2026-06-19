<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itinerary;

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
                ->orderBy('day')
                ->orderBy('id');
        },
        'packages.dayItems.hotels',
    ])->findOrFail($id);

    $dayItems = $itinerary->packages
        ->flatMap(fn ($package) => $package->dayItems);

    $dayWiseItems = $dayItems->groupBy('day');

    return view('itinerary.price.itinerary-price', compact(
        'itinerary',
        'dayItems',
        'dayWiseItems'
    ));
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
