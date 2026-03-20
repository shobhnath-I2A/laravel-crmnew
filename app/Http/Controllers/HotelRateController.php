<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;
use App\Models\HotelRate;
use App\Models\Hotel;
class HotelRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hotel.price-update');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.price-update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
           $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'room_type' => 'required',
                'meal_plan' => 'required',
                'single'      => 'nullable|numeric|min:0|max:9999999999',
                'double'      => 'nullable|numeric|min:0|max:9999999999',
                'triple'      => 'nullable|numeric|min:0|max:9999999999',
                'quad'        => 'nullable|numeric|min:0|max:9999999999',
                'child_bed'   => 'nullable|numeric|min:0|max:9999999999',
                'extra_adult' => 'nullable|numeric|min:0|max:9999999999'
            ]);

            $validated['start_date'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['end_date'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $hotelRate = HotelRate::create($validated);
            return response()->json([
                'status'=>true,
                'message'=>'Hotel Rate Created Successfully !!!',
                'data'=>$hotelRate
            ],201);
        }catch(ValidationException $ve){
            return response()->json([
                'status'=>false,
                'message'=> 'Validation Failed',
                'errors'=> $ve->errors()
            ],422);
        }
        catch(\Exception $e){
            return response()->json([
                'status'=>false,
                'message'=> $e->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $hotelId)
    {
        try {
            $hotelName = Hotel::where('id', $hotelId)->value('name');
            $hotelRates = HotelRate::where('hotel_id', $hotelId)->get();
            return view('hotel.price-update', compact('hotelRates', 'hotelId', 'hotelName'));

        } catch (\Exception $e) {
            Log::error('Hotel Rate show Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Rate not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        try {

            $hotelRate = HotelRate::findOrFail($id);
            $hotelRates = HotelRate::where('hotel_id', $hotelRate->hotel_id)->get();
            $hotelName = Hotel::where('id', $hotelRate->hotel_id)->value('name');
            $hotelId = $hotelRate->hotel_id;
            return view('hotel.price-update', compact('hotelRate', 'hotelRates', 'hotelId', 'hotelName'));

        } catch (\Exception $e) {
            Log::error('Hotel Rate Edit Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Rate not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'hotel_id' => 'required|exists:hotels,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'room_type' => 'required',
                'meal_plan' => 'required',
                'single'      => 'nullable|numeric|min:0|max:9999999999',
                'double'      => 'nullable|numeric|min:0|max:9999999999',
                'triple'      => 'nullable|numeric|min:0|max:9999999999',
                'quad'        => 'nullable|numeric|min:0|max:9999999999',
                'child_bed'   => 'nullable|numeric|min:0|max:9999999999',
                'extra_adult' => 'nullable|numeric|min:0|max:9999999999'
            ]);

            $validated['start_date'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['end_date'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $hotelRate = HotelRate::findOrFail($id);
            $hotelRate->update($validated);

        //    return $this->show($hotelRate->hotel_id);
            return response()->json([
                'status' => true,
                'message' => 'Updated Successfully'
            ]);

        } catch (ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors()
            ], 422);
        }catch(\Exception $e){
            Log::error('Error',$e->getMessage());
            return response()->json([
                'status'=>false,
                'message'=> $e->getMessage()
            ],500);
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
