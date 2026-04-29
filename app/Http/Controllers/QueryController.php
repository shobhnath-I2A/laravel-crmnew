<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Query;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $queryBuilder = Query::query();

            if ($request->statusid) {
                $queryBuilder->where('statusId', $request->statusid);
            }

            $queries = $queryBuilder->latest()->paginate(10);

            $totalQueries = Query::count();

            $statusCounts = Query::selectRaw('statusId, COUNT(*) as total')
                ->groupBy('statusId')
                ->pluck('total', 'statusId');

            return view('queries.index', compact(
                'queries',
                'statusCounts',
                'totalQueries'
            ));
        } catch (Exception $e) {

            Log::error('Error fetching queries: ' . $e->getMessage());

            return view('queries.index', [
                'queries' => collect(),
                'statusCounts' => [],
                'totalQueries' => 0,
                'error' => 'Unable to fetch queries at this time.'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('queries.add-query');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'mobile' => 'required|digits:10',
                'email' => 'required|email',
                'submitName' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'querytype' => 'required|string|max:100',
                'travelMonth' => 'nullable|string|max:50',
                'origin' => 'required|string|max:100',
                'destination' => 'required|string|max:100',
                'adult' => 'required|integer|min:1',
                'child' => 'nullable|integer|min:0',
                'infant' => 'nullable|integer|min:0',
                'leadSource' => 'nullable|string|max:100',
                'priorityStatus' => 'nullable|integer',
                'assignTo' => 'nullable|string|max:100',
                'serviceId' => 'nullable|string|max:100',
                'details' => 'nullable|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date',
            ]);
            $validated['startDate'] = Carbon::parse($request->startDate)->format('Y-m-d');
            $validated['endDate'] = Carbon::parse($request->endDate)->format('Y-m-d');

            $query = Query::create($validated);
            return response()->json([
                'status' => true,
                'message' => 'Query created successfully',
                'data' => $query
            ]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
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
    public function show(Request $request, $id)
    {
        try {
            $query = Query::findOrFail($id);
            $tab = $request->query('tab', 'details');
            // $tab = $request->get('tab', 'details'); // default tab
            return view('queries.view-query', compact('query', 'tab'));
        } catch (Exception $e) {
            Log::error('Error fetching query: ' . $e->getMessage());
            return redirect()->route('queries.index')
                ->with('error', 'Query not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $query = Query::findOrFail($id);
            return view('queries.edit-query', compact('query'));
        } catch (Exception $e) {
            Log::error('Error fetching query: ' . $e->getMessage());
            return redirect()->route('queries.index')
                ->with('error', 'Query not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'mobile' => 'required|digits:10',
                'email' => 'required|email',
                'submitName' => 'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'querytype' => 'required|string|max:100',
                'travelMonth' => 'nullable|string|max:50',
                'origin' => 'required|string|max:100',
                'destination' => 'required|string|max:100',
                'adult' => 'required|integer|min:1',
                'child' => 'nullable|integer|min:0',
                'infant' => 'nullable|integer|min:0',
                'leadSource' => 'nullable|string|max:100',
                'priorityStatus' => 'nullable|integer',
                'assignTo' => 'nullable|string|max:100',
                'serviceId' => 'nullable|string|max:100',
                'details' => 'nullable|string',
                'startDate' => 'required|date',
                'endDate' => 'required|date',
            ]);

            $query = Query::findOrFail($id);

            $validated['startDate'] = Carbon::parse($validated['startDate'])->format('Y-m-d');
            $validated['endDate'] = Carbon::parse($validated['endDate'])->format('Y-m-d');
            $validated['child'] = $validated['child'] ?? 0;
            $validated['infant'] = $validated['infant'] ?? 0;

            $query->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Query updated successfully',
                'data' => $query
            ]);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $ve->errors()
            ], 422);
        } catch (Exception $e) {

            Log::error('Error updating query: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Update failed'
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
