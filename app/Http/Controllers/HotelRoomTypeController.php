<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Hotel;
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

            $roomTypeBuilder = RoomType::with(['hotel', 'createdBy']);

            if ($request->filled('keyword')) {
                $roomTypeBuilder->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->keyword . '%')
                        ->orWhereHas('hotel', function ($q) use ($request) {
                            $q->where('name', 'like', '%' . $request->keyword . '%');
                        })
                        ->orWhereHas('createdBy', function ($q) use ($request) {
                            $q->where('name', 'like', '%' . $request->keyword . '%');
                        });
                });
            }

            $roomTypeCount = (clone $roomTypeBuilder)->count();

            $roomType = $roomTypeBuilder
                ->latest()
                ->paginate(20);

            $roomType->appends($request->all());

            return view('hotel-rooms-type.index', compact('roomType', 'roomTypeCount'));
        } catch (\Exception $e) {

            Log::error('Fetch to show the Room Type', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::where('status', 1)
            ->orderBy('name')
            ->get();

        return view('hotel-rooms-type.add-room', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'name'      => 'required|string|max:255',
                'status'    => 'required|in:0,1',

            ]);
            // dd($validated);
            // Save data
            $validated['created_by'] = auth()->id();

            $roomType = RoomType::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Room created successfully",
                'data' => $roomType
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
    // public function show(string $id)
    // {
    //     try {
    //         $roomType = RoomType::findOrFail($id);
    //         return view('hotel-rooms-type.edit-rooms', compact('roomType'));
    //     } catch (\Exception $e) {
    //         Log::error('Show Room Type Error: ' . $e->getMessage());
    //         return back()->with('error', 'Room type not found.');
    //     }
    // }
    public function show(string $id)
    {
        try {
            $roomType = RoomType::findOrFail($id);
            $hotels = Hotel::where('status', 1)
                ->orderBy('name')
                ->get();

            return view(
                'hotel-rooms-type.edit-rooms',
                compact('roomType', 'hotels')
            );
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
        $roomType = RoomType::findOrFail($id);

        $hotels = Hotel::where('status', 1)
            ->orderBy('name')
            ->get();

        return view('hotel-rooms-type.edit-rooms', compact('roomType', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            //  Validation
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'name'      => 'required|string|max:255',
                'status'    => 'required|in:0,1',
            ]);

            $validated['created_by'] = auth()->id();

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
