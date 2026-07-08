<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


        $request->validate([

            'query_id' => 'required',
            'first_name' => 'required',
            'gender' => 'required'

        ]);



        QueryGuest::updateOrCreate(

            [
                'id' => $request->edit_id
            ],

            [
                'query_id' => $request->query_id,
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'dob' => Carbon::parse($request->dob)
                    ->format('Y-m-d')

            ]
        );


        return back()
            ->with('success', 'Guest saved successfully');
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
