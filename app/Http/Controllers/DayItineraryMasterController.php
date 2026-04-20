<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DayItineraryMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class DayItineraryMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $dayItineraryBuilder = DayItineraryMaster::query();

            if ($request->filled('keyword')) {
                $dayItineraryBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $dayItinerary = $dayItineraryBuilder->latest()->paginate(10);
            $dayItinerary->appends($request->all());
            $dayItineraryCount = DayItineraryMaster::count();
            // dd($dayItinerary);
            return view('day-itinerary-master.index', compact('dayItinerary', 'dayItineraryCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Day Itinerary', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('day-itinerary-master.add-edit-day-itinerary-master');
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
                'details' => 'nullable|string',
                'destination' => 'nullable|string|max:255',
            ]);
            // dd($validated);
            // Save data
            $dayItinerary  = DayItineraryMaster::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Day Itinerary created successfully",
                'data' => $dayItinerary
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
            $dayItinerary = DayItineraryMaster::findOrFail($id);
            return view('day-itinerary-master.add-edit-day-itinerary-master', compact('dayItinerary'));
        } catch (\Exception $e) {
            Log::error('Show Day Itinerary Error: ' . $e->getMessage());
            return back()->with('error', 'Day itinerary not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $dayItinerary = DayItineraryMaster::findOrFail($id);
            return view('day-itinerary-master.add-edit-day-itinerary-master', compact('dayItinerary'));
        } catch (\Exception $e) {
            Log::error('Error fetch to day itinerary', $e->getMessage());
            return back()->with('error', 'Day itinerary not found.');
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
                'details' => 'nullable|string',
                'destination' => 'nullable|string|max:255',
            ]);

            $dayItinerary = DayItineraryMaster::findOrFail($id);

            $dayItinerary->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Day Itinerary Update successfully",
                'data' => $dayItinerary
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
            $dayItinerary = DayItineraryMaster::findOrFail($id);
            $dayItinerary->delete();

            return redirect()->route('hotels.index')
                ->with('success', 'Day itinerary deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete Day Itinerary Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete day itinerary.');
        }
    }
}
