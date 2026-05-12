<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageInclusion;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class PackageInclusionController extends Controller
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
            $validated =  $request->validate([
                'inclusions_title' => 'nullable|string|max:255',
                'package_inclusions' => 'nullable|string',

                'important_tips_title' => 'nullable|string|max:255',
                'package_important_tips' => 'nullable|string',

                'exclusions_title' => 'nullable|string|max:255',
                'package_exclusions' => 'nullable|string',

                'travel_information_title' => 'nullable|string|max:255',
                'package_travel_info' => 'nullable|string',
            ]);

            $validated['user_id'] = auth()->id();
            $validated['created_at'] = Carbon::now();
            PackageInclusion::create($validated);
            return response()->json([
                'status' => true,
                'message' => 'Package Inclusion saved successfully!',
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error storing Package Inclusion', [
                'exception' => $e
            ]);

            return redirect()->route('settings.show', ['tab' => 'package-inclusions'])
                ->with('error', 'Something went wrong!');
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
            $inclusion = PackageInclusion::findOrFail($id);
            return view('setting.package-inclusion', compact('inclusion'));
        } catch (\Exception $e) {
            Log::error('Error fetching Package Inclusion for Edit', [
                'exception' => $e,
                'inclusion_id' => $id
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $inclusion = PackageInclusion::findOrFail($id);
            $validated =  $request->validate([
                'inclusions_title' => 'nullable|string|max:255',
                'package_inclusions' => 'nullable|string',

                'important_tips_title' => 'nullable|string|max:255',
                'package_important_tips' => 'nullable|string',

                'exclusions_title' => 'nullable|string|max:255',
                'package_exclusions' => 'nullable|string',

                'travel_information_title' => 'nullable|string|max:255',
                'package_travel_info' => 'nullable|string',
            ]);

            $validated['user_id'] = auth()->id();
            $validated['created_at'] = Carbon::now();
            $inclusion->update($validated);
            return response()->json([
                'status' => true,
                'message' => 'Package Inclusion updated successfully!',
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error storing Package Inclusion', [
                'exception' => $e
            ]);

            return redirect()->route('settings.show', ['tab' => 'package-inclusions'])
                ->with('error', 'Something went wrong!');
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
