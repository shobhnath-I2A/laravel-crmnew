<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\QueryGuest;
use Carbon\Carbon;

class QueryGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryId = request()->query('query_id');
        return view('guest-documents.add-guest', compact('queryId'));
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

            $validated = $request->validate([
                'query_id'   => 'required|integer',
                'title'      => 'required|string|max:10',
                'first_name' => 'required|string|max:100',
                'last_name'  => 'required|string|max:100',
                'gender'     => 'required|string|in:Male,Female,Other',
                'dob'        => 'required|date_format:d-m-Y'
            ]);

            $validated['dob'] = Carbon::createFromFormat('d-m-Y', $validated['dob'])
                ->format('Y-m-d');

            $guest = QueryGuest::updateOrCreate(
                ['id' => $request->edit_id],
                $validated
            );

            return response()->json([
                    'status'  => 'success',
                    'message' => 'Task added successfully',
                    'data'=>$guest
                ],201);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Failed to create task: ' . $e->getMessage()
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
        try {
            QueryGuest::findOrFail($id)->delete();

            return back()
                ->with('success', 'Guest removed');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Guest not found');
        }
    }
}
