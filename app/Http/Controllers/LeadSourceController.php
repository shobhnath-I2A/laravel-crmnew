<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadSource;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LeadSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $leadSourceBuilder = LeadSource::query();

            if ($request->filled('keyword')) {
                $leadSourceBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }

            $leadSource = $leadSourceBuilder->latest()->paginate(10);
            $leadSource->appends($request->all());
            $leadSourceCount = LeadSource::count();
            // dd($leadSource);
            return view('lead-source.index', compact('leadSource', 'leadSourceCount'));
        } catch (\Exception $e) {
            Log::error('Fetch to show the Lead Source', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lead-source.add-edit-lead-source');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
            ]);
            // dd($validated);
            // Save data
            $leadSource  = LeadSource::create($validated);

            return response()->json([
                'status' => true,
                'message' => "Lead Source created successfully",
                'data' => $leadSource
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
    public function show(string $id)
    {
        try {
            $leadSource = LeadSource::findOrFail($id);
            return view('lead-source.add-edit-lead-source', compact('leadSource'));
        } catch (\Exception $e) {
            Log::error('Show Lead Source Error: ' . $e->getMessage());
            return back()->with('error', 'Lead source not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $leadSource = LeadSource::findOrFail($id);
            return view('lead-source.add-edit-lead-source', compact('leadSource'));
        } catch (\Exception $e) {
            Log::error('Error fetch to lead source', $e->getMessage());
            return back()->with('error', 'Lead source not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            //  Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|in:0,1',
            ]);

            $leadSource = LeadSource::findOrFail($id);

            $leadSource->update($validated);

            return response()->json([
                'status' => true,
                'message' => "Lead Source Update successfully",
                'data' => $leadSource
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

}
