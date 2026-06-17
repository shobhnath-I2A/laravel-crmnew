<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Automation;

class AutomationController extends Controller
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
        $queryStatuses = Query::get();
        $destinations = Destination::get();
        $packages = Package::get();
        return view('setting.automation.create', compact(
            'queryStatuses',
            'destinations',
            'packages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'query_status'    => 'required|not_in:0',
            'package_id'      => 'required|not_in:0',
            'destination_id'  => 'required',
            'details'         => 'nullable|string',
            'start_date'      => 'required|date',
            'end_date'        => 'required|date|after_or_equal:start_date',
            'status'          => 'nullable|boolean',
            'edit_id'         => 'nullable|integer',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['created_by'] = auth()->id();

        Automation::create($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Automation created successfully.',
        ]);
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
        $automation = Automation::findOrFail($id);
        $queryStatuses = Query::get();
        $destinations = Destination::get();
        $packages = Package::get();
        return view('setting.automation.create', compact(
            'automation',
            'queryStatuses',
            'destinations',
            'packages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $automation = Automation::findOrFail($id);

        $validated = $request->validate([
            'query_status'   => 'required|not_in:0',
            'package_id'     => 'required|not_in:0',
            'destination_id' => 'required',
            'details'        => 'nullable|string',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after_or_equal:start_date',
            'status'         => 'nullable|boolean',
            'edit_id'        => 'nullable|integer',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['created_by'] = auth()->id();

        $automation->update($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Automation updated successfully.',
            'data'    => $automation->fresh(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
