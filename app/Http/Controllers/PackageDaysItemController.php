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
            'itinerary_id' => 'required|integer',
            'day' => 'required',
            'destination_id' => 'nullable|integer',
            'type' => 'required|string|max:50',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->except(['_token', 'Save']);

            $data['type'] = strtolower($request->type);

            PackageDayItem::create($data);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Item added successfully.',
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
