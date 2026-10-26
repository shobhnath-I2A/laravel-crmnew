<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteBookMaster;

class NoteBookMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $notes = NoteBookMaster::query()
            ->where('added_by', $request->user()->id)
            ->latest()
            ->get();

        return view('partials.note-book-blade', compact('notes'));
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
        $validated = $request->validate([
            'details' => 'nullable|string|max:10000',
        ]);

        $note = NoteBookMaster::create([
            'details' => $validated['details'] ?? '',
            'added_by' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Entry created successfully',
            'data' => [
                'id' => $note->id,
                'details' => $note->details,
                'update_url' => route('notebook.update', $note->id),
                'delete_url' => route('notebook.destroy', $note->id),
            ],
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $note = NoteBookMaster::query()
            ->where('added_by', $request->user()->id)
            ->findOrFail($id);

        return response()->json($note);
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
        $note = NoteBookMaster::query()
            ->where('added_by', $request->user()->id)
            ->findOrFail($id);

        $validated = $request->validate([
            'details' => 'nullable|string|max:10000',
        ]);

        $note->update([
            'details' => $validated['details'] ?? '',
        ]);

        return response()->json([
            'message' => 'Entry updated successfully',
            'data' => $note
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $note = NoteBookMaster::query()
            ->where('added_by', $request->user()->id)
            ->findOrFail($id);
        $note->delete();

        return response()->json([
            'message' => 'Entry deleted successfully'
        ]);
    }
}
