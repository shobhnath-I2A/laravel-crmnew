<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransferMasterRateList;
use App\Models\TransferMaster;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class TransferMasterRateListController extends Controller
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
        try {
            $request->validate([
                'transfer_id' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'adult'      => 'nullable|numeric|min:0|max:999999999',
                'child'      => 'nullable|numeric|min:0|max:9999999999',
                'vehicle_cost'      => 'nullable|numeric|min:0|max:999999999',
            ]);

            $validated['start_date'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['end_date'] = Carbon::parse($request->endDate)->format('Y-m-d');

            // $data['addedBy'] = auth()->id() ?? 1;

            $transferRate = TransferMasterRateList::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Transfer Rate Created Successfully !!!',
                'data' => $transferRate
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
    public function show(string $transferId)
    {

        try {
            $transferMasterName = TransferMaster::where('id', $transferId)->value('name');
            $transferMasterRateLists = TransferMasterRateList::where('transfer_id', $transferId)->get();
            // dd($transferMasterRateList);
            return view('transfer.price-update', compact('transferMasterRateLists', 'transferId', 'transferMasterName'));

        } catch (\Exception $e) {
            Log::error('Transfer Rate show Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Tranfer not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       try {

            $transferMasterRateList = TransferMasterRateList::findOrFail($id);
            $transferMasterRateLists = TransferMasterRateList::where('transfer_id', $transferMasterRateList->transfer_id)->get();
            $transferMasterName = TransferMaster::where('id', $transferMasterRateList->transfer_id)->value('name');
            $transferMaster_id = $transferMasterRateList->transfer_id;
            return view('transfer.price-update', compact('transferMasterRateList', 'transferMasterRateLists', 'transferMaster_id', 'transferMasterName'));

        } catch (\Exception $e) {
            Log::error('Transfer Rate Edit Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Rate not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try {
            $request->validate([
                'transfer_id' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'adult'      => 'nullable|numeric|min:0|max:999999999',
                'child'      => 'nullable|numeric|min:0|max:9999999999',
                'vehicle_cost'      => 'nullable|numeric|min:0|max:999999999',
            ]);

            $validated['start_date'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['end_date'] = Carbon::parse($request->endDate)->format('Y-m-d');

            // $data['addedBy'] = auth()->id() ?? 1;

            $transferRate = TransferMasterRateList::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Transfer Rate Created Successfully !!!',
                'data' => $transferRate
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

        try {
            $rate = TransferMasterRateList::findOrFail($id);
            $rate->delete();

            return back()->with('success', 'Rate deleted successfully!');
        } catch (\Exception $e) {

            Log::error('Transfer Rate Delete Error', [
                'exception' => $e
            ]);

            return back()->with('error', 'Something went wrong!');
        }
    }
}
