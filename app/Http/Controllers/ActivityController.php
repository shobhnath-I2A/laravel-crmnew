<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Exception;
class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $activityBuilder = Activity::query();
            if ($request->filled('keyword')) {
                $activityBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }
            $activities = $activityBuilder->latest()->paginate(5);
            $activities->appends($request->all());
            $activityCount = Activity::count();

            return view('activity.index', compact('activities', 'activityCount'));
        } catch (\Exception $e) {
            Log::error('Error featching Activity', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity.add-activity');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'destination_id' => 'nullable',
                'details' => 'nullable|string',
                'status' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('activites', 'public');
            }
            $activity = Activity::create($validated);
            return response()->json([
                'status' => true,
                'message' => 'Activity created Successfully',
                'data' => $activity
            ]);
        } catch (ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->getMessage()
            ]);
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
    public function show(string $id)
    {
        try {
            $activity = Activity::findOrFail($id);
            return view('activity.edit-activity', compact('activity'));
        } catch (\Exception $e) {
            Log::error('Error fetching Activity', $e->getMessage());
            return redirect()->json()->with('error', 'Activity not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $activity = Activity::findOrFail($id);
            return view('activity.edit-activity', compact('activity'));
        } catch (\Exception $e) {
            Log::error('Error fetching Activity', $e->getMessage());
            return redirect()->json()->with('error', 'Activity not found');
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
                'destination_id' => 'nullable',
                'details' => 'nullable|string',
                'status' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $activity = Activity::findOrFail($id);
            // ✅ Upload image
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('hotels', 'public');
            }

            $activity->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Activity Updated successfully',
                'data' => $activity
            ]);
        } catch (ValidationException $ve) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Faild',
                'errors' => $ve->getMessage()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
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
