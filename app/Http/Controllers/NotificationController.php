<?php

namespace App\Http\Controllers;

use App\Models\LeadNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function unreadCount(Request $request)
    {
        $userId = $request->user()->id;

        return response()->json([
            'count' => LeadNotification::where('user_id', $userId)
                ->where('is_read', false)
                ->count()
        ]);
    }

    public function latest(Request $request)
    {
        $userId = $request->user()->id;

        return response()->json([
            'data' => LeadNotification::where('user_id', $userId)
                ->latest()
                ->take(5)
                ->get()
        ]);
    }

    public function markRead(Request $request, $id)
    {
        $userId = $request->user()->id;

        $notification = LeadNotification::where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        $notification->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        return response()->json([
            'status' => true
        ]);
    }
}
