<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\HotelRate;
use Exception;

class HotelRateController extends Controller
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
    public function create()
    {
        //
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
                'single'      => 'nullable|numeric|min:0',
                'double'      => 'nullable|numeric|min:0',
                'triple'      => 'nullable|numeric|min:0',
                'quad'        => 'nullable|numeric|min:0',
                'child_bed'   => 'nullable|numeric|min:0',
                'extra_adult' => 'nullable|numeric|min:0'
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
                'error'=> $ve->errors()
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
