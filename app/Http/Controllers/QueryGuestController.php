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
        $guest = request()->filled('edit_id') ? QueryGuest::where('query_id', $queryId)->findOrFail(request('edit_id')) : null;
        return view('guest-documents.add-guest', compact('queryId', 'guest'));
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
                'edit_id' => 'nullable|integer|exists:query_guests,id',
                'query_id'   => 'required|integer|exists:queries,id',
                'title'      => 'required|string|max:10',
                'first_name' => 'required|string|max:100',
                'last_name'  => 'required|string|max:100',
                'gender'     => 'required|string|in:Male,Female,Other',
                'dob'        => 'required|date_format:d-m-Y'
            ]);

            $validated['dob'] = Carbon::createFromFormat('d-m-Y', $validated['dob'])
                ->format('Y-m-d');

            unset($validated['edit_id']);
            $guest = \Illuminate\Support\Facades\DB::transaction(function () use ($request, $validated) {
            if ($request->filled('edit_id')) {
                $guest = QueryGuest::where('query_id', $validated['query_id'])->findOrFail($request->edit_id);
                $guest->update($validated);
            } else {
                $guest = QueryGuest::create($validated);
            }
            \App\Services\QueryHistory::record($guest->query_id, 'guest_saved', 'Guest #'.$guest->id.' saved');
            return $guest;
            });

            return response()->json([
                    'status'  => 'success',
                    'message' => 'Guest saved successfully',
                    'data'=>$guest
                ],201);
            } catch (ValidationException $e) {
                throw $e;
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                throw $e;
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Unable to save guest.'
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
            \Illuminate\Support\Facades\DB::transaction(function () use ($id) {
                $guest = QueryGuest::findOrFail($id);
                \App\Services\QueryHistory::record($guest->query_id, 'guest_deleted', 'Guest #'.$guest->id.' removed');
                $guest->delete();
            });

            return back()
                ->with('success', 'Guest removed');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Guest not found');
        }
    }
}
