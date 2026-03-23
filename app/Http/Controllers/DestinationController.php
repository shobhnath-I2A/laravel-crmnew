<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Exception;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $destinationBuilder = Destination::query();
            if ($request->filled('keyword')) {
                $destinationBuilder->where('name', 'like', '%' . $request->keyword . '%');
            }
            $destinations = $destinationBuilder->latest()->paginate(5);
            $destinations->appends($request->all());
            $destinationCount = Destination::count();

            return view('destination.index', compact('destinations', 'destinationCount'));
        } catch (\Exception $e) {
            Log::error('Error fetching Destination', [
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destination.add-destination');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:225|unique:destinations,name'
            ]);
            $validated['status'] = (int) $request->input('status', 1);
            $data = Destination::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Data stored successfully',
                'data' => $data
            ], 200);
        } catch (ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error to store destination', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'status' => false,
                'errors' => $e->getMessage()
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
            $destination = Destination::findOrFail($id);

            return view('destination.edit-destination', compact('destination'));
        } catch (\Exception $e) {
            Log::error('Error fetch destination', [
                'error' => $e->getMessage()
            ]);

            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $destination = Destination::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:225', Rule::unique('destinations', 'name')->ignore($id),
                'status' => 'nullable|boolean'

            ]);

            $validated['name'] = ucwords(strtolower($request->name));
            $validated['status'] = $request->has('status') ? 1 : 0;

            $destination->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Destination Updated successfully'
            ]);
        } catch (ValidationException $ve) {
            return response()->json([
                'status' => false,
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating destination', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
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
