<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\QueryTask;
use Carbon\Carbon;
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
        try {
            $validator = Validator::make($request->all(), [
                'queryId'      => 'required|integer',
                'taskType'     => 'required|in:Task,Call,Meeting',
                'details'      => 'nullable|string',
                'reminderDate' => 'required|date_format:d-m-Y',
                'reminderTime' => 'nullable',
                'assignTo'     => 'nullable|integer',
                'status'       => 'nullable|in:0,1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $reminderDateTime = null;

            if ($request->reminderDate) {
                $date = Carbon::createFromFormat('d-m-Y', $request->reminderDate)
                    ->format('Y-m-d');
                $time = '00:00:00';
                if ($request->reminderTime) {
                    $time = Carbon::parse($request->reminderTime)->format('H:i:s');
                }
                $reminderDateTime = $date . ' ' . $time;
            }
            QueryTask::create([
                'queryId'      => $request->queryId,
                'taskType'     => $request->taskType,
                'details'      => $request->details,
                'reminderDate' => $reminderDateTime,
                'assignTo'     => $request->assignTo,
                'status'       => $request->status ?? 0,
                // 'addedBy'      => auth()->id() ?? null,
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Task added successfully'
            ]);
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
        //
    }

    public function checkReminders()
    {
        try {
            $tasks = QueryTask::where('status', 0)
                ->whereNotNull('reminderDate')
                ->where('reminderDate', '<=', now())
                ->get();

            return response()->json($tasks);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to check reminders: ' . $e->getMessage()], 500);
        }
    }
    public function markDone($id)
    {
        try {
            $task = QueryTask::findOrFail($id);
            $task->update([
                'status' => 1,
                'makeDone' => 1,
                'confirmDate' => now()
            ]);

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to mark task as done: ' . $e->getMessage()], 500);
        }
    }
}
