<?php

namespace App\Http\Controllers;

use App\Models\PackageComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PackageCommentController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'packageid' => ['required', 'integer', 'exists:packages,id'],
            'comment' => ['required', 'string', 'max:5000'],
        ]);

        $comment = PackageComment::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Comment submitted successfully.',
            'comment' => $comment,
        ], 201);
    }
}
