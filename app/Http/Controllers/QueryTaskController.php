<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\QueryTask;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Exception;

class QueryTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queryId = request()->query('query_id');

        $users = \App\Models\User::where('status', 1)
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('followups.task', compact('queryId', 'users'));
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
        $validator = Validator::make($request->all(), [
            'queryId'      => 'required|integer|exists:queries,id',
            'taskType'     => 'required|in:Task,Call,Meeting',
            'details'      => 'nullable|string|max:10000',
            'setReminder'  => 'required|boolean',
            'reminderDate' => 'nullable|required_if:setReminder,1|date_format:Y-m-d',
            'reminderTime' => 'nullable|required_if:setReminder,1|date_format:H:i',
            'assignTo'     => [
                'nullable',
                'integer',
                \Illuminate\Validation\Rule::exists('users', 'id')
                    ->where('status', 1),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        try {
            $reminderDateTime = null;

            if ((int) $data['setReminder'] === 1) {
                $reminderDateTime = Carbon::createFromFormat(
                    '!Y-m-d H:i',
                    $data['reminderDate'] . ' ' . $data['reminderTime']
                )->format('Y-m-d H:i:s');
            }

            \Illuminate\Support\Facades\DB::transaction(
                function () use ($data, $reminderDateTime) {
                    $task = QueryTask::create([
                        'queryId'      => $data['queryId'],
                        'taskType'     => $data['taskType'],
                        'details'      => $data['details'] ?? null,
                        'reminderDate' => $reminderDateTime,
                        'assignTo'     => $data['assignTo'] ?? auth()->id(),
                        'status'       => 0, // Pending
                        'created_by'      => auth()->id(),
                    ]);

                    \App\Services\QueryHistory::record(
                        (int) $data['queryId'],
                        'task_created',
                        'Task #' . $task->id . ' created'
                    );
                }
            );

            return response()->json([
                'status'  => 'success',
                'message' => 'Task added successfully',
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'status'  => 'error',
                'message' => 'Unable to create task. Please check the application log.',
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
                $queryTask = QueryTask::findOrFail($id);
                \App\Services\QueryHistory::record($queryTask->queryId, 'task_deleted', 'Task #'.$queryTask->id.' removed');
                $queryTask->delete();
            });

            return response()->json([
                'status'  => true,
                'message' => 'QueryTask deleted successfully.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'QueryTask not found.',
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting QueryTask', [
                'id' => $id,
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong.',
            ], 500);
        }
    }

    public function checkReminders()
    {
        try {
            $tasks = QueryTask::whereIn('queryId', \App\Services\QueryAccess::scope(\App\Models\Query::query(), auth()->user())->select('id'))
                ->where('status', 0)
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
            \Illuminate\Support\Facades\DB::transaction(function () use ($id) {
                $task = QueryTask::lockForUpdate()->findOrFail($id);
                if ((int) $task->status === 1) { return; }
                $task->update(['status' => 1, 'makeDone' => 1, 'confirmDate' => now()]);
                \App\Services\QueryHistory::record($task->queryId, 'task_completed', 'Task #'.$task->id.' completed');
            });

            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to mark task as done: ' . $e->getMessage()], 500);
        }
    }
}
