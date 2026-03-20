<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Carbon;
use App\Models\ActivityRate;
use Exception;

class ActivityRateController extends Controller
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
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'activity_id' => 'required|exists:activities,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'adult'      => 'nullable|numeric|min:0|max:9999999999',
                'child'      => 'nullable|numeric|min:0|max:9999999999',
            ]);

            $validated['start_date'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['end_date'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $ActivityRate = ActivityRate::create($validated);
            return response()->json([
                'status' => true,
                'message' => 'Activity Rate Created Successfully !!!',
                'data' => $ActivityRate
            ], 201);
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
    public function show(string $activityId)
    {
        try {
            $activityName = Activity::where('id', $activityId)->value('name');
            $activityRates = ActivityRate::where('activity_id', $activityId)->get();
            return view('activity.price-update', compact('activityRates', 'activityId', 'activityName'));
        } catch (\Exception $e) {
            Log::error('Activity Rate show Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Rate not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            $activityRate = ActivityRate::findOrFail($id);
            $activityRates = ActivityRate::where('activity_id', $activityRate->activity_id)->get();
            $activityName = Activity::where('id', $activityRate->activity_id)->value('name');
            $activityId = $activityRate->activity_id;
            return view('activity.price-update', compact('activityRate', 'activityRates', 'activityId', 'activityName'));
        } catch (\Exception $e) {
            Log::error('activity Rate Edit Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Rate not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'activity_id' => 'required|exists:activities,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'adult'      => 'nullable|numeric|min:0|max:9999999999',
                'child'      => 'nullable|numeric|min:0|max:9999999999',
            ]);

            $validated['start_date'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['end_date'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $ActivityRate = ActivityRate::findOrFail($id);
            $ActivityRate->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Activity Rate Created Successfully !!!',
                'data' => $ActivityRate
            ], 201);
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
}
