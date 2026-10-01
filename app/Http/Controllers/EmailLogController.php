<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailLog;

class EmailLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = EmailLog::query()->where(function ($q) {
            $q->whereIn('query_id', \App\Services\QueryAccess::scope(\App\Models\Query::query(), auth()->user())->select('id'));
            if (auth()->user()->isAdmin()) { $q->orWhereNull('query_id'); }
            else { $q->orWhere(fn ($legacy) => $legacy->whereNull('query_id')->where('created_by', auth()->id())); }
        });

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('to_email', 'like', "%{$keyword}%")
                    ->orWhere('subject', 'like', "%{$keyword}%")
                    ->orWhere('status', 'like', "%{$keyword}%");
            });
        }

        $emailLogs = $query
            ->latest()
            ->paginate(20)
            ->appends($request->all());

        return view('email-logs.index', compact('emailLogs'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emailLog = EmailLog::findOrFail($id);

        return view('email-logs.show', compact('emailLog'));
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
        $emailLog = EmailLog::findOrFail($id);

        $emailLog->delete();

        return redirect()
            ->route('email-logs.index')
            ->with('success', 'Email log deleted successfully.');
    }

    public function attachment($email_log)
    {
        $log = EmailLog::findOrFail($email_log);
        abort_unless($log->attachment, 404);
        $path = $log->attachment;
        abort_if(str_contains($path, '..') || str_starts_with($path, '/'), 404);
        $disk = str_starts_with($path, 'private-mail/') ? 'local' : 'public';
        abort_unless(\Illuminate\Support\Facades\Storage::disk($disk)->exists($path), 404);
        return \Illuminate\Support\Facades\Storage::disk($disk)->download($path);
    }
}
