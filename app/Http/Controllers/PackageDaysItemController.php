<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageDayItem;
use App\Models\Activity;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
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
            $packageDayItem = PackageDayItem::findOrFail($id);
            $type = $request->type;

            if ($type == 'daydetail') {
                $validated = $request->validate([
                    'day_subject' => 'required|string|max:255',
                    'description' => 'required|string|max:5000',
                ]);

                $packageDayItem->update($validated);
            } elseif ($type == 'activity') {
                $validated = $request->validate([
                    'day_order'      => 'required|integer',
                    'destination_id' => 'required|integer',
                    'hotel_type'      => 'required|in:0,1',
                    'hotel_name'     => 'nullable|string|max:255',
                    'hotel_id' => 'nullable|string',
                    'check_in_date'     => 'required|date_format:d-m-Y',
                    'check_in_time'        => 'nullable|date_format:H:i:s',
                    'check_out_time'       => 'nullable|date_format:H:i:s',
                    'show_time'      => 'nullable|boolean',
                    'description'    => 'required|string|max:5000',
                ]);
                $packageDayItem->update($validated);
                return response()->json([
                    'status' => true,
                    'message' => 'Record Update Successfully'
                ], 200);
            } elseif ($type == 'accommodation') {
                $validated = $request->validate([
                    'day_order'      => 'required|integer',
                    'destination_id' => 'required|integer',
                    'single_room' => 'nullable|integer',
                    'double_room' => 'nullable|integer',
                    'triple_room' => 'nullable|integer',
                    'quad_room' => 'nullable|integer',
                    'cwb_room' => 'nullable|integer',
                    'cnb_room' => 'nullable|integer',
                    'hotel_type'      => 'required|in:0,1',
                    'hotel_options'      => 'required|in:1,2,3,4,5',
                    'hotel_name'     => 'nullable|string|max:255',
                    'room_name'     => 'nullable|string|max:255',
                    'meal_plan'     => 'nullable|string|max:255',
                    'hotel_id' => 'nullable|string',
                    'check_in_date'     => 'required|date_format:d-m-Y',
                    'check_out_date'     => 'required|date_format:d-m-Y',
                    'check_in_time'        => 'nullable|date_format:H:i:s',
                    'check_out_time'       => 'nullable|date_format:H:i:s',
                    'show_time'      => 'nullable|boolean',
                    'description'    => 'required|string|max:5000',
                ]);
                $packageDayItem->update($validated);
                return response()->json([
                    'status' => true,
                    'message' => 'Record Update Successfully'
                ], 200);
            }
            else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid type provided.'
                ], 400);
            }

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
        try {
            $item = PackageDayItem::findOrFail($id);
            $item->delete();

            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting day details: ' . $e->getMessage(), [
                'id' => $id,
                'stack' => $e->getTraceAsString()
            ]);
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete item'
            ], 500);
        }
    }

    public function getMasterData(Request $request)
    {
        $data = Activity::where('destination_id', $request->destination_id)->get();

        $html = '<option value="">Select</option>';

        foreach ($data as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }

        return response($html);
    }
}
