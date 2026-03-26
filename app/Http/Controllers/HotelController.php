<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Validation\ValidationException;
use Illuminate\Carbon;
use Illuminate\Support\Facades\Log;
use Exception;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $hotelBuilder = Hotel::query();

            if ($request->filled('keyword')) {
                $hotelBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }
            $hotels = $hotelBuilder->latest()->paginate(5);
            $hotels->appends($request->all());
            $hotelCount = Hotel::count();

            return view('hotel.index', compact('hotels', 'hotelCount'));
        } catch (\Exception $e) {
            Log::error('Error fetching Hotel', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.add-hotel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'category' => 'required',
                'destination' => 'required|string|max:255',
                'details' => 'nullable|string',
                'contact_person' => 'nullable|string|max:255',
                'contact_person_email' => 'nullable|string|max:255',
                'contact_person_phone' => 'nullable|digits:10',
                'hotel_link' => 'nullable|string|max:255',
                'status' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            // ✅ Upload image
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('hotels', 'public');
            }

            $hotel = Hotel::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Hotel created successfully",
                'data' => $hotel
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
    public function show(string $id) {
        try{
            $hotel = Hotel::findOrFail($id);
            return view('hotel.view-hotel', compact('hotel'));

        }catch(\Exception $e){
            Log::error('Error Fetching Hotel: ' .$e->getMessage());
            return redirect()->json('hotel->index')->with('error', 'Hotel not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            return view('hotel.edit-hotel', compact('hotel'));
        } catch (Exception $e) {
            Log::error('Error fetching Hotel: ' . $e->getMessage());
            return redirect()->route('hotels.index')
                ->with('error', 'Hotel not found.');
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
                'category' => 'required',
                'destination' => 'required|string|max:255',
                'details' => 'nullable|string',
                'contact_person' => 'nullable|string|max:255',
                'contact_person_email' => 'nullable|string|max:255',
                'contact_person_phone' => 'nullable|digits:10',
                'hotel_link' => 'nullable|string|max:255',
                'status' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $hotel = Hotel::findOrFail($id);

            // ✅ Upload image
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('hotels', 'public');
            }

            $hotel->update($validated);;

            return response()->json([
                'status' => true,
                'message' => "Hotel Update successfully",
                'data' => $hotel
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
        //
    }

    public function getHotels($destinationId)
    {
        $hotels = Hotel::where('destination_id', $destinationId)->get();

        $html = '<option value="">Select Hotel</option>';

        foreach ($hotels as $hotel) {
            $html .= '<option value="'.$hotel->id.'">'.$hotel->name.'</option>';
        }

        return $html;
    }
}
