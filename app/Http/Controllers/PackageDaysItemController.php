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
use Illuminate\Support\Facades\DB;

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

        $packageDayItem->type = $type;
        $packageDayItem->itinerary_id = $request->itinerary_id;
        $packageDayItem->day = $request->day;
        $packageDayItem->day_id = $request->day;
        $packageDayItem->day_order = 1;
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
        $validated = $request->validate([
            'itinerary_id'     => ['required', 'integer'],
            'destination_id'   => ['nullable', 'integer'],
            'type'             => ['required', 'string', 'max:50'],
            'day'              => ['required', 'integer'],
            'day_order'        => ['nullable', 'integer'],

            'name'             => ['nullable', 'string', 'max:255'],
            'description'      => ['nullable', 'string'],

            'hotel_id'         => ['nullable', 'integer'],
            'hotel_type'       => ['nullable', 'integer'],
            'room_type'        => ['nullable', 'string', 'max:255'],
            'room_name'        => ['nullable', 'string', 'max:255'],
            'meal_plan'        => ['nullable', 'string', 'max:255'],
            'hotel_options'    => ['nullable', 'string', 'max:255'],

            'flight_no'        => ['nullable', 'string', 'max:100'],
            'from_destination' => ['nullable', 'string', 'max:255'],
            'to_destination'   => ['nullable', 'string', 'max:255'],
            'flight_duration'  => ['nullable', 'string', 'max:255'],

            'check_in_date'    => ['nullable', 'string'],
            'check_out_date'   => ['nullable', 'string'],
            'check_in_time'    => ['nullable', 'string'],
            'check_out_time'   => ['nullable', 'string'],

            'day_subject'      => ['nullable', 'string', 'max:255'],
            'show_time'        => ['nullable'],
            'transfer_category' => ['nullable', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {
            $data = [
                'package_id'         => $validated['itinerary_id'],
                'destination_id'     => $validated['destination_id'] ?? null,
                'type'               => strtolower($validated['type']),
                'day'                => $validated['day'],
                'day_order'          => $validated['day_order'] ?? 1,

                'name'               => $validated['name'] ?? null,
                'description'        => $validated['description'] ?? null,

                'hotel_id'           => $validated['hotel_id'] ?? null,
                'hotel_type'         => $validated['hotel_type'] ?? 0,
                'room_type'          => $validated['room_type'] ?? null,
                'room_name'          => $validated['room_name'] ?? null,
                'meal_plan'          => $validated['meal_plan'] ?? null,
                'hotel_options'      => $validated['hotel_options'] ?? null,

                'flight_no'          => $validated['flight_no'] ?? null,
                'from_destination'   => $validated['from_destination'] ?? null,
                'to_destination'     => $validated['to_destination'] ?? null,
                'flight_duration'    => $validated['flight_duration'] ?? null,

                'check_in_date'      => $this->formatDate($validated['check_in_date'] ?? null),
                'check_out_date'     => $this->formatDate($validated['check_out_date'] ?? null),
                'check_in_time'      => $validated['check_in_time'] ?? null,
                'check_out_time'     => $validated['check_out_time'] ?? null,

                'day_subject'        => $validated['day_subject'] ?? null,
                'show_time'          => $validated['show_time'] ?? null,
                'transfer_category'  => $validated['transfer_category'] ?? null,
            ];

            $item = PackageDayItem::create($data);

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Item added successfully.',
                'item_id' => $item->id,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Package day item create failed', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'request' => $request->all(),
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'Unable to add item.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
    private function formatDate($date)
    {
        if (!$date) {
            return null;
        }

        try {
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Throwable $e) {
            return null;
        }
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
    // public function edit(Request $request, string $id)
    // {
    //     try {
    //         $packageDayItem = PackageDayItem::findOrFail($id);
    //         $type = $packageDayItem->type;
    //         $dayId = $packageDayItem->type;
    //         $itineraryId = $request->itinerary_id;
    //         return view('package-day-items.forms', compact('packageDayItem', 'itineraryId'));
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching Package day details: ' . $e->getMessage());
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Unable to load day details'
    //         ], 500);
    //     }
    // }
    public function edit(PackageDayItem $packageDaysItem)
    {
        $packageDayItem = $packageDaysItem;

        return view('package-day-items.forms', compact('packageDayItem'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageDayItem $packageDaysItem)
    {
        DB::beginTransaction();

        try {
            $data = $request->except(['_token', '_method', 'Save']);

            $packageDaysItem->update($data);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Item updated successfully.',
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageDayItem $packageDaysItem)
    {
        $packageDaysItem->delete();

        return response()->json([
            'status' => true,
            'message' => 'Item deleted successfully.',
        ]);
    }
    // public function destroy(string $id)
    // {
    //     try {
    //         $item = PackageDayItem::findOrFail($id);
    //         $item->delete();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Deleted successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         Log::error('Error deleting day details: ' . $e->getMessage(), [
    //             'id' => $id,
    //             'stack' => $e->getTraceAsString()
    //         ]);
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Failed to delete item'
    //         ], 500);
    //     }
    // }

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
