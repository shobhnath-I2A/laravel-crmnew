<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageDayItem;
use App\Models\Activity;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cache;
use Exception;

class PackageDaysItemController extends Controller
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
    public function create(Request $request)
    {
        return view('package-day-items.forms', [
            'type' => $request->type,
            'dayId' => $request->day_id,
            'item' => null
        ]);

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
    public function edit(Request $request, string $id)
    {
        try {
            $packageDayItem = PackageDayItem::findOrFail($id);
            $type = $packageDayItem->type;
            $dayId = $packageDayItem->type;
            $itineraryId = $request->itinerary_id;
            return view('package-day-items.forms', compact('packageDayItem', 'itineraryId'));
        } catch (\Exception $e) {
            Log::error('Error fetching Package day details: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Unable to load day details'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'day_subject' => 'required|string|max:255',
                'description' => 'required|string|max:5000',
            ]);

            $packgeDayItem = PackageDayItem::findOrFail($id);

            $packgeDayItem->update($validated);;
            // Cache::forget("day_item_$id");
            return redirect()->route('itineraries.show', $request->itinerary_id);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMasterData(Request $request)
    {
        $data = Activity::where('destination_id', $request->destination_id)->get();

        $html = '<option value="">Select</option>';

        foreach ($data as $row) {
            $html .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }

        return response($html);
    }
}
