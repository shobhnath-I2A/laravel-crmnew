<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageDayItem;
use Illuminate\Support\Facades\Log;
use Exception;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function updateDay(Request $request)
    {
       try{
        $package = Package::where('itinerary_id', $request->itinerary_id)->firstOrFail();

        PackageDayItem::updateOrCreate(
            [
                'package_id' => $package->id,
                'day' => $request->day
            ],
            [
                'destination_id' => $request->destination_id,
                'description' => $request->description
            ]
        );

        return response()->json(['status' => true]);
       }catch(\Exception $e){
        Log::error('Update days on package day item controller', $e->getMessage());
       }
    }
}
