<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlanMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
class MealPlanMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $mealPlanBuilder = MealPlanMaster::query();

            if ($request->filled('keyword')) {
                $mealPlanBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $mealPlan = $mealPlanBuilder->latest()->paginate(10);
            $mealPlan->appends($request->all());
            $mealPlanCount = MealPlanMaster::count();
            // dd($mealPlan);
            return view('meal-plan-master.index', compact('mealPlan', 'mealPlanCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Meal Plan', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meal-plan-master.add-edit-meal-plan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
            ]);
            // dd($validated);
            // Save data
            $mealPlan  = MealPlanMaster::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Meal Plan created successfully",
                'data' => $mealPlan
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
    public function show(string $id)
    {
        try {
            $mealPlan = MealPlanMaster::findOrFail($id);
            return view('meal-plan-master.add-edit-meal-plan', compact('mealPlan'));
        } catch (\Exception $e) {
            Log::error('Show Meal Plan Error: ' . $e->getMessage());
            return back()->with('error', 'Meal plan not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $mealPlan = MealPlanMaster::findOrFail($id);
            return view('meal-plan-master.add-edit-meal-plan', compact('mealPlan'));
        } catch (\Exception $e) {
            Log::error('Error fetch to meal plan', $e->getMessage());
            return back()->with('error', 'Meal plan not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            //  Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|in:0,1',
            ]);

            $roomType = MealPlanMaster::findOrFail($id);

            $roomType->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Meal Plan Update successfully",
                'data' => $roomType
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $roomType = MealPlanMaster::findOrFail($id);
            $roomType->delete();

            return redirect()->route('hotels.index')
                ->with('success', 'Meal plan deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete Meal Plan Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete meal plan.');
        }
    }
}
