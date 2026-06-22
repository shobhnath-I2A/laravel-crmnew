<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchMaster;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class BranchMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    //    try{
    //         $branches = BranchMaster::all();
    //          $tab = $request->query('tab', 'branches-setting');
    //         return view('setting.branches-setting', compact('branches', 'tab'));
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching Branch Masters', [
    //             'exception' => $e
    //         ]);

    //         return redirect()->route('settings.show', ['tab' => 'branches'])
    //             ->with('error', 'Something went wrong!');
    //    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setting.add-branch-master');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'destinations' => 'nullable|string',
            ]);

            $validated['status'] = $request->has('status') ? 1 : 0;
            $validated['created_by'] = auth()->id();
            $validated['dateAdded'] = now();

            $branchMaster = BranchMaster::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Branch Master created successfully',
                'data' => $branchMaster
            ], 201);
        } catch (\Exception $e) {

            Log::error('Error creating Branch Master', [
                'exception' => $e
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!'
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
        try {

            $branchMaster = BranchMaster::findOrFail($id);
            return view('setting.add-branch-master', compact('branchMaster'));
        } catch (\Exception $e) {

            Log::error('Error edit Branch Master', [
                'exception' => $e
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $branchMaster = BranchMaster::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'destinations' => 'nullable|string',
            ]);

            $validated['status'] = $request->has('status') ? 1 : 0;

            $branchMaster->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Branch Master updated successfully',
                'data' => $branchMaster
            ], 200);
        } catch (\Exception $e) {

            Log::error('Error updating Branch Master', [
                'exception' => $e
            ]);

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!'
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
