<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use App\Models\PackageDayItem;
use App\Models\Activity;
use App\Models\Package;
use App\Models\PackageDayItemHotel;
use App\Models\PackageDayItemFlight;
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
        $type = strtolower($request->item_type ?? 'accommodation');

        $packageDayItem = new PackageDayItem();

        $packageDayItem->itinerary_id = $request->itinerary_id;
        $packageDayItem->package_id = $request->package_id;
        $packageDayItem->type = $type;
        $packageDayItem->day = $request->day;
        $packageDayItem->day_order = $request->day_order ?? 1;
        $packageDayItem->destination_id = $request->destination_id;
        $packageDayItem->check_in_date = $request->date;
        $packageDayItem->check_out_date = $request->date;

        return view('package-day-items.forms', compact('packageDayItem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'itinerary_id'      => 'required|integer',
                'package_id'        => 'required|integer',
                'destination_id'    => 'nullable|integer',
                'type'              => 'required|string|max:50',
                'day'               => 'required|integer',
                'day_order'         => 'nullable|integer',

                'source_type' => 'nullable|in:0,1,2',

                'name'              => 'nullable|string|max:255',
                'description'       => 'nullable|string',
                'show_time'         => 'nullable',

                'hotel_id'          => 'nullable|integer',
                'room_type'         => 'nullable|string|max:255',
                'room_name'         => 'nullable|string|max:255',
                'meal_plan'         => 'nullable|string|max:255',
                'hotel_options'     => 'nullable|string|max:255',

                'single_room'       => 'nullable|integer',
                'double_room'       => 'nullable|integer',
                'triple_room'       => 'nullable|integer',
                'quad_room'         => 'nullable|integer',
                'cwb_room'          => 'nullable|integer',
                'cnb_room'          => 'nullable|integer',

                'start_date'     => 'nullable|date',
                'end_date'    => 'nullable|date',
                'start_time'        => 'nullable',
                'end_time'          => 'nullable',

                'flight_no'         => 'nullable|string|max:100',
                'from_destination'  => 'nullable|string|max:255',
                'to_destination'    => 'nullable|string|max:255',
                'flight_duration'   => 'nullable|string|max:255',

                'day_subject'       => 'nullable|string|max:255',
                'transfer_category' => 'nullable|string|max:255',
            ]);

            DB::beginTransaction();

            $type = strtolower($validated['type']);
            $sourceType = $validated['source_type'] ?? 0;

            $item = PackageDayItem::create([
                'package_id'     => $validated['package_id'],
                'destination_id' => $validated['destination_id'] ?? null,
                'type'           => $type,
                'source_type'    => $sourceType,
                'day'            => $validated['day'],
                'day_order'      => $validated['day_order'] ?? 0,
                'name'           => $validated['name'] ?? $validated['day_subject'] ?? null,
                'description'    => $validated['description'] ?? null,
                'show_time'      => $request->boolean('show_time'),
                'start_date'     => dbDate($validated['start_date'] ?? null),
                'start_time'     => $validated['start_time'] ?? null,
                'end_date'       => dbDate($validated['end_date'] ?? null),
                'end_time'       => $validated['end_time'] ?? null,
                'created_by'     => auth()->id(),
            ]);

            if ($type === 'accommodation') {

                $item->hotelDetail()->create([
                    'hotel_id'      => $sourceType == 1 ? ($validated['hotel_id'] ?? null) : null,
                    'room_type'     => $sourceType == 1 ? ($validated['room_type'] ?? null) : null,

                    'room_name'     => $sourceType == 0 ? ($validated['room_name'] ?? null) : null,

                    'meal_plan'     => $validated['meal_plan'] ?? null,
                    'hotel_options' => $validated['hotel_options'] ?? null,

                    'single_room'   => $validated['single_room'] ?? 0,
                    'double_room'   => $validated['double_room'] ?? 0,
                    'triple_room'   => $validated['triple_room'] ?? 0,
                    'quad_room'     => $validated['quad_room'] ?? 0,
                    'cwb_room'      => $validated['cwb_room'] ?? 0,
                    'cnb_room'      => $validated['cnb_room'] ?? 0,
                    'created_by'     => auth()->id(),
                ]);
            }

            if ($type === 'flight') {
                $item->flightDetail()->create([
                    'flight_no'        => $validated['flight_no'] ?? null,
                    'from_destination' => $validated['from_destination'] ?? null,
                    'to_destination'   => $validated['to_destination'] ?? null,
                    'flight_duration'  => $validated['flight_duration'] ?? null,
                    'created_by'     => auth()->id(),
                ]);
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Item added successfully.',
                'item_id' => $item->id,
            ], 201);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Package day item create failed', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'request' => $request->all(),
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'Unable to add item.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(PackageDayItem $packageDaysItem)
    {
        $packageDayItem = $packageDaysItem->load([
            'destination',
            'hotelDetail.hotel',
            'flightDetail',
            'prices',
        ]);

        return view('package-day-items.forms', compact('packageDayItem'));
    }
    // public function edit(PackageDayItem $packageDaysItem)
    // {
    //     $packageDayItem = $packageDaysItem;
    //     // dd($packageDayItem);
    //     return view('package-day-items.forms', compact('packageDayItem'));
    // }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, PackageDayItem $packageDaysItem)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                // 'itinerary_id'      => 'required|integer',
                'package_id'        => 'required|integer',
                'destination_id'    => 'nullable|integer',
                'type'              => 'required|string|max:50',
                'day'               => 'required|integer',
                'day_order'         => 'nullable|integer',

                'source_type' => 'nullable|in:0,1,2',

                'name'              => 'nullable|string|max:255',
                'description'       => 'nullable|string',
                'show_time'         => 'nullable',

                'hotel_id'          => 'nullable|integer',
                'room_type'         => 'nullable|string|max:255',
                'room_name'         => 'nullable|string|max:255',
                'meal_plan'         => 'nullable|string|max:255',
                'hotel_options'     => 'nullable|string|max:255',

                'single_room'       => 'nullable|integer',
                'double_room'       => 'nullable|integer',
                'triple_room'       => 'nullable|integer',
                'quad_room'         => 'nullable|integer',
                'cwb_room'          => 'nullable|integer',
                'cnb_room'          => 'nullable|integer',

                'start_date'     => 'nullable|date',
                'end_date'    => 'nullable|date',
                'start_time'        => 'nullable',
                'end_time'          => 'nullable',

                'flight_no'         => 'nullable|string|max:100',
                'from_destination'  => 'nullable|string|max:255',
                'to_destination'    => 'nullable|string|max:255',
                'flight_duration'   => 'nullable|string|max:255',

                'day_subject'       => 'nullable|string|max:255',
                'transfer_category' => 'nullable|string|max:255',
            ]);

            DB::beginTransaction();

            // $type = strtolower($packageDaysItem->type);
            $type = strtolower($validated['type']);
            $sourceType = $validated['source_type'] ?? 0;
            if ($type == 'daydetail') {

                $packageDaysItem->update([
                    'name'        => $validated['name'] ?? null,
                    'description' => $validated['description'] ?? null,
                    'updated_by'  => auth()->id(),
                ]);
            } else {
                $packageDaysItem->update([
                    'package_id'     => $validated['package_id'],
                    'destination_id' => $validated['destination_id'] ?? null,
                    'type'           => $type,
                    'source_type'    => $sourceType,
                    'day'            => $validated['day'],
                    'day_order'      => $validated['day_order'] ?? 0,
                    'name'           => $validated['name'] ?? $validated['day_subject'] ?? null,
                    'description'    => $validated['description'] ?? null,
                    'show_time'      => $request->boolean('show_time'),
                    'start_date'     => dbDate($validated['start_date'] ?? null),
                    'start_time'     => $validated['start_time'] ?? null,
                    'end_date'       => dbDate($validated['end_date'] ?? null),
                    'end_time'       => $validated['end_time'] ?? null,
                    'updated_by'    => auth()->id(),
                ]);
            }

            if ($type === 'accommodation') {
                $packageDaysItem->hotelDetail()->updateOrCreate(
                    ['package_day_item_id' => $packageDaysItem->id],
                    [
                        'hotel_id'      => $sourceType == 1 ? ($validated['hotel_id'] ?? null) : null,
                        'room_type'     => $sourceType == 1 ? ($validated['room_type'] ?? null) : null,

                        'room_name'     => $sourceType == 0 ? ($validated['room_name'] ?? null) : null,

                        'meal_plan'     => $validated['meal_plan'] ?? null,
                        'hotel_options' => $validated['hotel_options'] ?? null,

                        'single_room'   => $validated['single_room'] ?? 0,
                        'double_room'   => $validated['double_room'] ?? 0,
                        'triple_room'   => $validated['triple_room'] ?? 0,
                        'quad_room'     => $validated['quad_room'] ?? 0,
                        'cwb_room'      => $validated['cwb_room'] ?? 0,
                        'cnb_room'      => $validated['cnb_room'] ?? 0,
                    ]
                );
            }

            if ($type === 'flight') {
                $packageDaysItem->flightDetail()->updateOrCreate(
                    ['package_day_item_id' => $packageDaysItem->id],
                    [
                        'flight_no'        => $validated['flight_no'] ?? null,
                        'from_destination' => $validated['from_destination'] ?? null,
                        'to_destination'   => $validated['to_destination'] ?? null,
                        'flight_duration'  => $validated['flight_duration'] ?? null,
                    ]
                );
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Item updated successfully.',
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Package day item update failed', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'Unable to update item.',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageDayItem $packageDaysItem)
    {
        try {
            $packageDaysItem->delete();

            return response()->json([
                'status' => true,
                'message' => 'Item deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting day details: ' . $e->getMessage(), [
                'id' => $packageDaysItem,
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
