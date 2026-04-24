<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LeadNotificationCreated implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public $notification;
    public $userId;

    public function __construct($notification, $userId)
    {
        $this->notification = $notification;
        $this->userId = $userId;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('lead-notifications'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'lead.notification.created';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->notification->id ?? null,
            'lead_id' => $this->notification->lead_id ?? null,
            'type' => $this->notification->type ?? null,
            'title' => $this->notification->title ?? null,
            'message' => $this->notification->message ?? null,
            'data' => $this->notification->data ?? [],
            'created_at' => now()->format('d M Y h:i:s A'),
        ];
    }
}
