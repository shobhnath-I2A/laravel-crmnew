<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class HotelRoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $roomTypeBuilder = RoomType::query();

            if ($request->filled('keyword')) {
                $roomTypeBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $roomType = $roomTypeBuilder->latest()->paginate(10);
            $roomType->appends($request->all());
            $roomTypeCount = RoomType::count();
            // dd($roomType);
            return view('hotel-rooms-type.index', compact('roomType', 'roomTypeCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Room Type', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel-rooms-type.add-room');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // ✅ Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
            ]);
            // dd($validated);
            // ✅ Save data
            $roomType = RoomType::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Room created successfully",
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $roomType = RoomType::findOrFail($id);
            return view('hotel-rooms-type.edit-rooms', compact('roomType'));
        } catch (\Exception $e) {
            Log::error('Show Room Type Error: ' . $e->getMessage());
            return back()->with('error', 'Room type not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $roomType = RoomType::findOrFail($id);
            return view('hotel-rooms-type.edit-rooms', compact('roomType'));
        } catch (\Exception $e) {
            Log::error('Error fetch to room type', $e->getMessage());
            return back()->with('error', 'Room type not found.');
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

            $roomType = RoomType::findOrFail($id);

            $roomType->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Room Update successfully",
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
            $roomType = RoomType::findOrFail($id);
            $roomType->delete();

            return redirect()->route('hotels.index')
                ->with('success', 'Room type deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete Room Type Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete room type.');
        }
    }
}
