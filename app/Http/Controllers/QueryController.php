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
    public function index()
    {
       try {
            $queries = Query::latest()->paginate(1);
            return view('queries.index', compact('queries'));
        } catch (Exception $e) {
            Log::error('Error fetching queries: '.$e->getMessage());
            return view('queries.index', [
                'queries' => collect(), 
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
            'details' => 'nullable|string'
        ]);
        $validated['startDate'] = Carbon::parse($request->startDate)->format('Y-m-d');
        $validated['endDate'] = Carbon::parse($request->endDate)->format('Y-m-d');
        try {
            $query = Query::create($validated);
            return response()->json([
                'status' => true,
                'message' => 'Query created successfully',
                'data' => $query
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
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
