<?php

namespace App\Http\Controllers;

use App\Models\LeadNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    protected $userId;

    public function __construct(Request $request)
    {
        $this->userId = $request->user()->id ?? 1;
    }

    public function unreadCount(Request $request)
    {
        return response()->json([
            'count' => LeadNotification::where('user_id', $this->userId)
                ->where('is_read', false)
                ->count()
        ]);
    }

    public function latest(Request $request)
    {
        return response()->json([
            'data' => LeadNotification::where('user_id', $this->userId)
                ->latest()
                ->take(20)
                ->get()
        ]);
    }

    public function markRead(Request $request, $id)
    {
        $notification = LeadNotification::where('user_id', $this->userId)
            ->findOrFail($id);

        $notification->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        return response()->json([
            'status' => true
        ]);
    }
}
