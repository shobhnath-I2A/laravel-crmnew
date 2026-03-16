<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueryTask;
use Exception;
class QueryTaskController extends Controller
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
        try{

        dd($request->all());
         QueryTask::create([
            'queryId' => $request->queryId,
            'taskType' => $request->taskType,
            'details' => $request->details,
            'reminderDate' => $request->reminderDate,
            // 'addedBy' => auth()->id(),
        ]);

        return response()->json([
            'status' => 'success'
        ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create task: '.$e->getMessage()
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
        //
    }
}
