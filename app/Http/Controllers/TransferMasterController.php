<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransferMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class TransferMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $transferMasterBuilder = TransferMaster::query();

            if ($request->filled('keyword')) {
                $transferMasterBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }
            $transferMaster = $transferMasterBuilder->latest()->paginate(5);
            $transferMaster->appends($request->all());
            $transferCount = TransferMaster::count();

            return view('transfer.index', compact('transferMaster', 'transferCount'));
        } catch (\Exception $e) {
            Log::error('Error fetching Transfer', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transfer.add-transfer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'name' => 'required',
                'destination_id' => 'required',
                'details' => 'required',
                'status' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $transfer = TransferMaster::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Transfer created successfully",
                'data' => $transfer
            ], 200);
        } catch (ValidationException $ve) {
            return view([
                'status' => false,
                'message' => 'validation Failed',
                'errors' => $ve
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transferMaster = TransferMaster::findOrFail($id);
        return view('transfer.edit-transfer', compact('transferMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $transfer = TransferMaster::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required',
                'destination_id' => 'required',
                'details' => 'required',
                'status' => 'nullable|boolean',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $transfer->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Transfer Updated successfully",
                'data' => $transfer
            ], 200);
        } catch (ValidationException $ve) {
            return view([
                'status' => false,
                'message' => 'validation Failed',
                'errors' => $ve
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
}
